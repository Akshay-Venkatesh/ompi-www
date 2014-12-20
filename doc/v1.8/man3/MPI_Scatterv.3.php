<?php
$topdir = "../../..";
$title = "MPI_Scatterv(3) man page (version 1.8.4)";
$meta_desc = "Open MPI v1.8.4 man page: MPI_SCATTERV(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Scatterv, <a href="../man3/MPI_Iscatterv.3.php">MPI_Iscatterv</a></b> - Scatters a buffer in parts to all
tasks in a group.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Scatterv(const void *sendbuf, const int sendcounts[], const int
displs[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype sendtype, void *recvbuf, int recvcount,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype recvtype, int root, MPI_Comm comm)
int <a href="../man3/MPI_Iscatterv.3.php">MPI_Iscatterv</a>(const void *sendbuf, const int sendcounts[], const int
displs[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype sendtype, void *recvbuf, int recvcount,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype recvtype, int root, MPI_Comm comm, MPI_Request *request)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_SCATTERV(SENDBUF, SENDCOUNTS, DISPLS, SENDTYPE, RECVBUF,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;RECVCOUNT, RECVTYPE, ROOT, COMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDBUF(*), RECVBUF(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDCOUNTS(*), DISPLS(*), SENDTYPE
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;RECVCOUNT, RECVTYPE, ROOT, COMM, IERROR
<a href="../man3/MPI_Iscatterv.3.php">MPI_ISCATTERV</a>(SENDBUF, SENDCOUNTS, DISPLS, SENDTYPE, RECVBUF,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;RECVCOUNT, RECVTYPE, ROOT, COMM, REQUEST, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDBUF(*), RECVBUF(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDCOUNTS(*), DISPLS(*), SENDTYPE
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;RECVCOUNT, RECVTYPE, ROOT, COMM, REQUEST, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Comm::Scatterv(const void* sendbuf, const int sendcounts[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const int displs[], const MPI::Datatype&amp; sendtype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;void* recvbuf, int recvcount, const MPI::Datatype&amp;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;recvtype, int root) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>sendbuf </dt>
<dd>Address of send buffer (choice, significant only
at root). </dd>

<dt>sendcounts </dt>
<dd>Integer array (of length group size) specifying the
number of elements to send to each processor. </dd>

<dt>displs </dt>
<dd>Integer array (of length
group size). Entry i specifies the displacement (relative to sendbuf) from
which to take the outgoing data to process i. </dd>

<dt>sendtype </dt>
<dd>Datatype of send
buffer elements (handle). </dd>

<dt>recvcount </dt>
<dd>Number of elements in receive buffer
(integer). </dd>

<dt>recvtype </dt>
<dd>Datatype of receive buffer elements (handle). </dd>

<dt>root </dt>
<dd>Rank
of sending process (integer). </dd>

<dt>comm </dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>recvbuf
</dt>
<dd>Address of receive buffer (choice). </dd>

<dt>request </dt>
<dd>Request (handle, non-blocking
only). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Scatterv
is the inverse operation to <a href="../man3/MPI_Gatherv.3.php">MPI_Gatherv</a>.  <p>
MPI_Scatterv extends the functionality
of <a href="../man3/MPI_Scatter.3.php">MPI_Scatter</a> by allowing a varying count of data to be sent to each process,
since <i>sendcounts</i> is now an array. It also allows more flexibility as to
where the data is taken from on the root, by providing the new argument,
<i>displs</i>. <p>
The outcome is as if the root executed <i>n</i> send operations, <p>
<br>
<pre>    <a href="../man3/MPI_Send.3.php">MPI_Send</a>(sendbuf + displs[i] * extent(sendtype), \
             sendcounts[i], sendtype, i, ...)
and each process executed a receive,
    <a href="../man3/MPI_Recv.3.php">MPI_Recv</a>(recvbuf, recvcount, recvtype, root, ...)
The send buffer is ignored for all nonroot processes.
</pre><p>
The type signature implied by <i>sendcount</i>[<i>i</i>], <i>sendtype</i> at the root must be
equal to the type signature implied by <i>recvcount</i>, <i>recvtype</i> at process <i>i</i>
(however, the type maps may be different). This implies that the amount
of data sent must be equal to the amount of data received, pairwise between
each process and the root. Distinct type maps between sender and receiver
are still allowed. <p>
All arguments to the function are significant on process
<i>root</i>, while on other processes, only arguments <i>recvbuf</i>, <i>recvcount</i>, <i>recvtype</i>,
<i>root</i>, <i>comm</i> are significant. The arguments <i>root</i> and <i>comm</i> must have identical
values on all processes. <p>
The specification of counts, types, and displacements
should not cause any location on the root to be read more than once. <p>
<b>Example
1:</b> The reverse of Example 5 in the <a href="../man3/MPI_Gatherv.3.php">MPI_Gatherv</a> manpage. We have a varying
stride between blocks at sending (root) side, at the receiving side we
receive 100 - <i>i</i> elements into the <i>i</i>th column of a 100 x 150 C array at process
<i>i</i>.  <p>
<br>
<pre>    MPI_Comm comm;
        int gsize,recvarray[100][150],*rptr;
        int root, *sendbuf, myrank, bufsize, *stride;
        MPI_Datatype rtype;
        int i, *displs, *scounts, offset;
        ...
        <a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>( comm, &amp;gsize);
        <a href="../man3/MPI_Comm_rank.3.php">MPI_Comm_rank</a>( comm, &amp;myrank );

        stride = (int *)malloc(gsize*sizeof(int));
        ...
        /* stride[i] for i = 0 to gsize-1 is set somehow
         * sendbuf comes from elsewhere
         */
        ...
        displs = (int *)malloc(gsize*sizeof(int));
        scounts = (int *)malloc(gsize*sizeof(int));
        offset = 0;
        for (i=0; i&lt;gsize; ++i) {
            displs[i] = offset;
            offset += stride[i];
            scounts[i] = 100 - i;
        }
        /* Create datatype for the column we are receiving
         */
        <a href="../man3/MPI_Type_vector.3.php">MPI_Type_vector</a>( 100-myrank, 1, 150, MPI_INT, &amp;rtype);
        <a href="../man3/MPI_Type_commit.3.php">MPI_Type_commit</a>( &amp;rtype );
        rptr = &amp;recvarray[0][myrank];
        MPI_Scatterv(sendbuf, scounts, displs, MPI_INT,
                     rptr, 1, rtype, root, comm);
</pre><p>
<b>Example 2:</b> The reverse of Example 1 in the <a href="../man3/MPI_Gather.3.php">MPI_Gather</a> manpage. The root
process scatters sets of 100 ints to the other processes, but the sets
of 100 are stride ints apart in the sending buffer. Requires use of MPI_Scatterv,
where <i>stride</i> &gt;= 100.   <p>
<br>
<pre>    MPI_Comm comm;
        int gsize,*sendbuf;
        int root, rbuf[100], i, *displs, *scounts;

    ...

    <a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>(comm, &amp;gsize);
        sendbuf = (int *)malloc(gsize*stride*sizeof(int));
        ...
        displs = (int *)malloc(gsize*sizeof(int));
        scounts = (int *)malloc(gsize*sizeof(int));
        for (i=0; i&lt;gsize; ++i) {
            displs[i] = i*stride;
            scounts[i] = 100;
        }
        MPI_Scatterv(sendbuf, scounts, displs, MPI_INT,
                     rbuf, 100, MPI_INT, root, comm);
</pre>
<h2><a name='sect8' href='#toc8'>Use of In-place Option</a></h2>
When the communicator is an intracommunicator, you
can perform a gather operation in-place (the output buffer is used as the
input buffer).  Use the variable MPI_IN_PLACE as the value of the root process
<i>recvbuf</i>.  In this case, <i>recvcount</i> and <i>recvtype</i> are ignored, and the root
process sends no data to itself.     <p>
Note that MPI_IN_PLACE is a special
kind of value; it has the same restrictions on its use as MPI_BOTTOM. <p>
Because
the in-place option converts the receive buffer into a send-and-receive buffer,
a Fortran binding that includes INTENT must mark these as INOUT, not OUT.
   <p>

<h2><a name='sect9' href='#toc9'>When Communicator is an Inter-communicator</a></h2>
<p>
When the communicator is an
inter-communicator, the root process in the first group sends data to all
processes in the second group.  The first group defines the root process.
 That process uses MPI_ROOT as the value of its <i>root</i> argument.  The remaining
processes use MPI_PROC_NULL as the value of their <i>root</i> argument.  All processes
in the second group use the rank of that root process in the first group
as the value of their <i>root</i> argument.   The receive buffer argument of the
root process in the first group must be consistent with the receive buffer
argument of the processes in the second group.    <p>

<h2><a name='sect10' href='#toc10'>Errors</a></h2>
Almost all MPI routines
return an error value; C routines as the value of the function and Fortran
routines in the last argument. C++ functions do not return errors. If the
default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error
the C++ exception mechanism will be used to throw an MPI::Exception object.
<p>
Before the error value is returned, the current MPI error handler is called.
By default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error.
<p>
<h2><a name='sect11' href='#toc11'>See Also</a></h2>
<p>
<br>
<pre><a href="../man3/MPI_Gather.3.php">MPI_Gather</a>
<a href="../man3/MPI_Gatherv.3.php">MPI_Gatherv</a>
<a href="../man3/MPI_Scatter.3.php">MPI_Scatter</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
