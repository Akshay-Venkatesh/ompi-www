<?
$subject_val = "Re: [OMPI devel] pointer_array";
include("../../include/msg-header.inc");
?>
<!-- received="Mon Dec 17 08:54:03 2007" -->
<!-- isoreceived="20071217135403" -->
<!-- sent="Mon, 17 Dec 2007 08:53:14 -0500" -->
<!-- isosent="20071217135314" -->
<!-- name="Jeff Squyres" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] pointer_array" -->
<!-- id="AFE6C38B-6F0C-4857-93F5-A501578FB6E4_at_cisco.com" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="9D11309E-D70D-446D-8B75-6A427ED645C8_at_eecs.utk.edu" -->
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
<strong>Subject:</strong> Re: [OMPI devel] pointer_array<br>
<strong>From:</strong> Jeff Squyres (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2007-12-17 08:53:14
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="2870.php">Ralph H Castain: "Re: [OMPI devel] pointer_array"</a>
<li><strong>Previous message:</strong> <a href="2868.php">Jeff Squyres: "Re: [OMPI devel] pointer_array"</a>
<li><strong>In reply to:</strong> <a href="2865.php">George Bosilca: "Re: [OMPI devel] pointer_array"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I see a few changes in this patch that seem to be unrelated to the s/ 
<br>
orte_pointer_array/opal_pointer_array/g change:
<br>
<p>1. Several ORTE files add &lt;string.h&gt; (and nothing else)
<br>
2. I see a &lt;tab&gt; in ompi/class/Makefile.am :-)
<br>
3. Some superfluous indenting changes (op.h, and coll_hierarch, etc.)
<br>
4. Changes from extern &quot;C&quot; to BEGIN/END_C_DECLS (in the pml, etc.)
<br>
5. ia32/atomic.h changes a #define
<br>
<p>I'm not opposed to any of these changes (except maybe #5 -- I'm not  
<br>
sure why that change is there?  We *do* have compset_64 for ia32; it's  
<br>
just not inline...?), but it would be good if they could come in  
<br>
separately so that the actual s/orte_pointer_array/opal_pointer_array/ 
<br>
g change could be isolated as a discrete changeset.
<br>
<p><p>On Dec 16, 2007, at 6:18 PM, George Bosilca wrote:
<br>
<p><span class="quotelev1">&gt; Right, I wonder why it didn't show in the patch file. Anyway, it  
</span><br>
<span class="quotelev1">&gt; completely remove the orte_pointer_array.[ch] as well as the  
</span><br>
<span class="quotelev1">&gt; ompi_pointer_array.[ch] file.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;  Thanks,
</span><br>
<span class="quotelev1">&gt;    george.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Dec 16, 2007, at 12:01 AM, Tim Mattox wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; The patch looks good to my eyeballs, though I've not done any  
</span><br>
<span class="quotelev2">&gt;&gt; testing with it.
</span><br>
<span class="quotelev2">&gt;&gt; I presume a follow on patch would remove the orte_pointer_array. 
</span><br>
<span class="quotelev2">&gt;&gt; [ch] files?
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Dec 15, 2007 4:01 PM, George Bosilca &lt;bosilca_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I have a patch that unify the pointer array implementations into  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; just
</span><br>
<span class="quotelev3">&gt;&gt;&gt; one. Right now, we have 2 pointer array implementations: one for  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ORTE
</span><br>
<span class="quotelev3">&gt;&gt;&gt; and one for OMPI. The differences are small and mostly insignificant
</span><br>
<span class="quotelev3">&gt;&gt;&gt; (there is no way to add more than 2^31 elements in the pointer array
</span><br>
<span class="quotelev3">&gt;&gt;&gt; anyway). The following patch propose to merge these two pointer  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; array
</span><br>
<span class="quotelev3">&gt;&gt;&gt; into one, implemented in OPAL (and called opal_pointer_array).
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; If nobody has complained before Wednesday noon I'll commit the  
</span><br>
<span class="quotelev3">&gt;&gt;&gt; patch.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  Thanks,
</span><br>
<span class="quotelev3">&gt;&gt;&gt;    george.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; -- 
</span><br>
<span class="quotelev2">&gt;&gt; Tim Mattox, Ph.D. - <a href="http://homepage.mac.com/tmattox/">http://homepage.mac.com/tmattox/</a>
</span><br>
<span class="quotelev2">&gt;&gt; tmattox_at_[hidden] || timattox_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;   I'm a bright... <a href="http://www.the-brights.net/">http://www.the-brights.net/</a>
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<p><p><pre>
-- 
Jeff Squyres
Cisco Systems
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="2870.php">Ralph H Castain: "Re: [OMPI devel] pointer_array"</a>
<li><strong>Previous message:</strong> <a href="2868.php">Jeff Squyres: "Re: [OMPI devel] pointer_array"</a>
<li><strong>In reply to:</strong> <a href="2865.php">George Bosilca: "Re: [OMPI devel] pointer_array"</a>
<!-- nextthread="start" -->
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
