<?
$subject_val = "Re: [OMPI devel] Failure to make progress";
include("../../include/msg-header.inc");
?>
<!-- received="Mon Feb 23 16:54:55 2009" -->
<!-- isoreceived="20090223215455" -->
<!-- sent="Mon, 23 Feb 2009 16:54:47 -0500" -->
<!-- isosent="20090223215447" -->
<!-- name="George Bosilca" -->
<!-- email="bosilca_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Failure to make progress" -->
<!-- id="97F85B80-35B3-4922-9595-FBCF05B89B96_at_eecs.utk.edu" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="E1LbiIC-0000P8-Nx_at_cosmos.phy.tufts.edu" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>Subject:</strong> Re: [OMPI devel] Failure to make progress<br>
<strong>From:</strong> George Bosilca (<em>bosilca_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-02-23 16:54:47
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="5517.php">Eugene Loh: "Re: [OMPI devel] RFC: eliminating &quot;descriptor&quot; argument from sendi function"</a>
<li><strong>Previous message:</strong> <a href="5515.php">Ken Olum: "[OMPI devel] Failure to make progress"</a>
<li><strong>In reply to:</strong> <a href="5515.php">Ken Olum: "[OMPI devel] Failure to make progress"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="5531.php">Ken Olum: "Re: [OMPI devel] Failure to make progress"</a>
<li><strong>Reply:</strong> <a href="5531.php">Ken Olum: "Re: [OMPI devel] Failure to make progress"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Ken,
<br>
<p>Your interpretation of the MPI standard is way too optimistic.  
<br>
Unfortunately, there is no asynchronous progress (expect on very few  
<br>
devices) in most of the MPI libraries. So, you should not expect the  
<br>
non blocking send to complete, without going in some MPI calls  
<br>
(MPI_Test as an example).
<br>
<p>Moreover, your example is not really correct. While the MPI standard  
<br>
clearly state that MPI_Finalize is a collective over all connected  
<br>
processes, it also state that
<br>
<p>&quot;each process must ensure that all pending non-blocking communications  
<br>
are (locally) complete before calling MPI_FINALIZE. Further, at the  
<br>
instant at which the last process calls MPI_FINALIZE, all pending  
<br>
sends must be matched by a receive, and all pending receives must be  
<br>
matched by a send.
<br>
<p>A successful return from a blocking communication operation or from  
<br>
MPI_WAIT or MPI_TEST tells the user that the buffer can be reused and  
<br>
means that the communication is completed by the user, but does not  
<br>
guarantee that the local process has no more work to do. A successful  
<br>
return from MPI_REQUEST_FREE with a request handle generated by an  
<br>
MPI_ISEND nullifies the handle but provides no assurance of operation  
<br>
completion. The MPI_ISEND is complete only when it is known by some  
<br>
means that a matching receive has completed. MPI_FINALIZE guarantees  
<br>
that all local actions required by communications the user has  
<br>
completed will, in fact, occur before it returns.
<br>
<p>MPI_FINALIZE guarantees nothing about pending communications that have  
<br>
not been completed (completion is assured only by MPI_WAIT, MPI_TEST,  
<br>
or MPI_REQUEST_FREE combined with some other verification of  
<br>
completion).&quot;
<br>
<p>&nbsp;&nbsp;&nbsp;george.
<br>
<p><p><p>On Feb 23, 2009, at 16:24 , Ken Olum wrote:
<br>
<p><span class="quotelev1">&gt; I'm running OpenMPI 1.2.6 under Red Hat Enterprise Linux Server
</span><br>
<span class="quotelev1">&gt; release 5.2 on an x86_64 cluster.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; When I send a message with MPI_Isend I think it should eventually be
</span><br>
<span class="quotelev1">&gt; delivered (if I have a receive waiting), without my having to make any
</span><br>
<span class="quotelev1">&gt; other MPI calls.  This appears to be guaranteed by the spec.  In MPI
</span><br>
<span class="quotelev1">&gt; version 1.1, section 3.7.4, Semantics of Nonblocking Communications,
</span><br>
<span class="quotelev1">&gt; it says
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;    Progress A call to MPI_WAIT that completes a receive will  
</span><br>
<span class="quotelev1">&gt; eventually
</span><br>
<span class="quotelev1">&gt;    terminate and return if a matching send has been started, unless  
</span><br>
<span class="quotelev1">&gt; the
</span><br>
<span class="quotelev1">&gt;    send is satisfied by another receive. In particular, if the  
</span><br>
<span class="quotelev1">&gt; matching
</span><br>
<span class="quotelev1">&gt;    send is nonblocking, then the receive should complete even if no  
</span><br>
<span class="quotelev1">&gt; call
</span><br>
<span class="quotelev1">&gt;    is executed by the sender to complete the send.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; This appears never to work when my two processes are on different
</span><br>
<span class="quotelev1">&gt; nodes.  I enclose a test case below.  In this simple case, I can work
</span><br>
<span class="quotelev1">&gt; around the problem by waiting for the send to complete, but in general
</span><br>
<span class="quotelev1">&gt; after a bunch of communication I don't know any way that I can make
</span><br>
<span class="quotelev1">&gt; sure that all my sent messages have actually been sent, without
</span><br>
<span class="quotelev1">&gt; blocking.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; In the following code, rank 0 sends a message to rank 7, sleeps for 5
</span><br>
<span class="quotelev1">&gt; seconds, and then calls MPI_Finalize.  The output below shows that
</span><br>
<span class="quotelev1">&gt; rank 7 doesn't receive the message until finalize is called.
</span><br>
<span class="quotelev1">&gt; (Ranks 1-6 exist only to get the scheduler here to dispatch 0 and 7
</span><br>
<span class="quotelev1">&gt; to different nodes.)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;                                        Ken Olum
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; ----------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; #include &lt;stdlib.h&gt;
</span><br>
<span class="quotelev1">&gt; #include &lt;stdio.h&gt;
</span><br>
<span class="quotelev1">&gt; #include &lt;string.h&gt;
</span><br>
<span class="quotelev1">&gt; #include &lt;time.h&gt;
</span><br>
<span class="quotelev1">&gt; #include &quot;mpi.h&quot;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; char *timestamp()
</span><br>
<span class="quotelev1">&gt; { time_t now;
</span><br>
<span class="quotelev1">&gt;  struct tm *data;
</span><br>
<span class="quotelev1">&gt;  char *result;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;  time(&amp;now);
</span><br>
<span class="quotelev1">&gt;  data = localtime(&amp;now);
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;  result = malloc(9);
</span><br>
<span class="quotelev1">&gt;  sprintf(result, &quot;%2d:%02d:%02d&quot;, data-&gt;tm_hour, data-&gt;tm_min, data- 
</span><br>
<span class="quotelev2">&gt; &gt;tm_sec);
</span><br>
<span class="quotelev1">&gt;  return result;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; }
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; main( argc, argv )
</span><br>
<span class="quotelev1">&gt; int argc;
</span><br>
<span class="quotelev1">&gt; char **argv;
</span><br>
<span class="quotelev1">&gt; {
</span><br>
<span class="quotelev1">&gt;    char message[20];
</span><br>
<span class="quotelev1">&gt;    int myrank, mysize, flag, i;
</span><br>
<span class="quotelev1">&gt;    MPI_Status status;
</span><br>
<span class="quotelev1">&gt;    MPI_Request request;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;    MPI_Init(&amp;argc, &amp;argv);
</span><br>
<span class="quotelev1">&gt;    MPI_Comm_size(MPI_COMM_WORLD, &amp;mysize);
</span><br>
<span class="quotelev1">&gt;    MPI_Comm_rank(MPI_COMM_WORLD, &amp;myrank);
</span><br>
<span class="quotelev1">&gt;    printf(&quot;Proc %d, %s: initialized\n&quot;, myrank, timestamp());
</span><br>
<span class="quotelev1">&gt;    if (myrank == 0)    /* code for process zero */
</span><br>
<span class="quotelev1">&gt;    {
</span><br>
<span class="quotelev1">&gt;      strcpy(message,&quot;TEST&quot;);
</span><br>
<span class="quotelev1">&gt;      printf(&quot;Proc %d, %s: sending '%s'\n&quot;, myrank, timestamp(),  
</span><br>
<span class="quotelev1">&gt; message);
</span><br>
<span class="quotelev1">&gt;      MPI_Isend(message, strlen(message)+1, MPI_CHAR, mysize-1, 99,  
</span><br>
<span class="quotelev1">&gt; MPI_COMM_WORLD, &amp;request);
</span><br>
<span class="quotelev1">&gt;      printf(&quot;Proc %d, %s: sent\n&quot;, myrank, timestamp());
</span><br>
<span class="quotelev1">&gt;    }
</span><br>
<span class="quotelev1">&gt;    else if (myrank == mysize-1)               /* code for last  
</span><br>
<span class="quotelev1">&gt; process */
</span><br>
<span class="quotelev1">&gt;    {
</span><br>
<span class="quotelev1">&gt;      printf(&quot;Proc %d, %s: receiving\n&quot;, myrank, timestamp());
</span><br>
<span class="quotelev1">&gt;      MPI_Irecv(message, 20, MPI_CHAR, 0, 99, MPI_COMM_WORLD,  
</span><br>
<span class="quotelev1">&gt; &amp;request); /* Start it */
</span><br>
<span class="quotelev1">&gt;      MPI_Wait(&amp;request, &amp;status); /* Wait for it */
</span><br>
<span class="quotelev1">&gt;      printf(&quot;Proc %d, %s: received '%s'\n&quot;, myrank, timestamp(),  
</span><br>
<span class="quotelev1">&gt; message);
</span><br>
<span class="quotelev1">&gt;    }
</span><br>
<span class="quotelev1">&gt;    printf(&quot;Proc %d, %s: sleeping\n&quot;, myrank, timestamp());
</span><br>
<span class="quotelev1">&gt;    sleep(5);
</span><br>
<span class="quotelev1">&gt;    printf(&quot;Proc %d, %s: finalizing\n&quot;, myrank, timestamp());
</span><br>
<span class="quotelev1">&gt;    MPI_Finalize();
</span><br>
<span class="quotelev1">&gt; }
</span><br>
<span class="quotelev1">&gt; ----------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Proc 2, 16:16:19: initialized
</span><br>
<span class="quotelev1">&gt; Proc 2, 16:16:19: sleeping
</span><br>
<span class="quotelev1">&gt; Proc 3, 16:16:19: initialized
</span><br>
<span class="quotelev1">&gt; Proc 3, 16:16:19: sleeping
</span><br>
<span class="quotelev1">&gt; Proc 0, 16:16:19: initialized
</span><br>
<span class="quotelev1">&gt; Proc 0, 16:16:19: sending 'TEST'
</span><br>
<span class="quotelev1">&gt; Proc 0, 16:16:19: sent
</span><br>
<span class="quotelev1">&gt; Proc 0, 16:16:19: sleeping
</span><br>
<span class="quotelev1">&gt; Proc 5, 16:16:19: initialized
</span><br>
<span class="quotelev1">&gt; Proc 5, 16:16:19: sleeping
</span><br>
<span class="quotelev1">&gt; Proc 6, 16:16:19: initialized
</span><br>
<span class="quotelev1">&gt; Proc 6, 16:16:19: sleeping
</span><br>
<span class="quotelev1">&gt; Proc 7, 16:16:19: initialized
</span><br>
<span class="quotelev1">&gt; Proc 7, 16:16:19: receiving
</span><br>
<span class="quotelev1">&gt; Proc 1, 16:16:19: initialized
</span><br>
<span class="quotelev1">&gt; Proc 1, 16:16:19: sleeping
</span><br>
<span class="quotelev1">&gt; Proc 4, 16:16:19: initialized
</span><br>
<span class="quotelev1">&gt; Proc 4, 16:16:19: sleeping
</span><br>
<span class="quotelev1">&gt; Proc 3, 16:16:24: finalizing
</span><br>
<span class="quotelev1">&gt; Proc 5, 16:16:24: finalizing
</span><br>
<span class="quotelev1">&gt; Proc 0, 16:16:24: finalizing
</span><br>
<span class="quotelev1">&gt; Proc 2, 16:16:24: finalizing
</span><br>
<span class="quotelev1">&gt; Proc 6, 16:16:24: finalizing
</span><br>
<span class="quotelev1">&gt; Proc 1, 16:16:24: finalizing
</span><br>
<span class="quotelev1">&gt; Proc 4, 16:16:24: finalizing
</span><br>
<span class="quotelev1">&gt; Proc 7, 16:16:24: received 'TEST'
</span><br>
<span class="quotelev1">&gt; Proc 7, 16:16:24: sleeping
</span><br>
<span class="quotelev1">&gt; Proc 7, 16:16:29: finalizing
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="5517.php">Eugene Loh: "Re: [OMPI devel] RFC: eliminating &quot;descriptor&quot; argument from sendi function"</a>
<li><strong>Previous message:</strong> <a href="5515.php">Ken Olum: "[OMPI devel] Failure to make progress"</a>
<li><strong>In reply to:</strong> <a href="5515.php">Ken Olum: "[OMPI devel] Failure to make progress"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="5531.php">Ken Olum: "Re: [OMPI devel] Failure to make progress"</a>
<li><strong>Reply:</strong> <a href="5531.php">Ken Olum: "Re: [OMPI devel] Failure to make progress"</a>
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>
