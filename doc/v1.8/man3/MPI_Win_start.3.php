<?php
$topdir = "../../..";
$title = "MPI_Win_start(3) man page (version 1.8.4)";
$meta_desc = "Open MPI v1.8.4 man page: MPI_WIN_START(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Win_start</b> - Starts an RMA access epoch for <i>win</i>
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Win_start(MPI_Group group, int assert, MPI_Win win)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_WIN_START(GROUP, ASSERT, WIN, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER GROUP, ASSERT, WIN, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Win::Start(const MPI::Group&amp; group, int assert) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>group </dt>
<dd>The group of target processes (handle). </dd>

<dt>assert </dt>
<dd>Program
assertion (integer). </dd>

<dt>win </dt>
<dd>Window object (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>IERROR
</dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Win_start is a one-sided
MPI communication synchronization call that starts an RMA access epoch
for <i>win</i>. RMA calls issued on <i>win</i> during this epoch must access only windows
at processes in <i>group</i>. Each process in <i>group</i> must issue a matching call
to <a href="../man3/MPI_Win_post.3.php">MPI_Win_post</a>. MPI_Win_start is allowed to block until the corresponding
<a href="../man3/MPI_Win_post.3.php">MPI_Win_post</a> calls have been executed, but is not required to.  <p>
The <i>assert</i>
argument is used to provide assertions on the context of the call that
may be used for various optimizations. (See Section 6.4.4 of the MPI-2 Standard.)
A value of <i>assert</i> = 0 is always valid. The following assertion value is
supported: <p>

<dl>

<dt>MPI_MODE_NOCHECK   </dt>
<dd>When this value is passed in to this call,
the library assumes that the post call on the target has been called and
it is not necessary for the library to check to see if such a call has
been made.
<p> </dd>
</dl>

<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines return an error value; C routines
as the value of the function and Fortran routines in the last argument.
C++ functions do not return errors. If the default error handler is set
to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception mechanism
will be used to throw an MPI::Exception object. <p>
Before the error value is
returned, the current MPI error handler is called. By default, this error
handler aborts the MPI job, except for I/O function errors. The error handler
may be changed with <a href="../man3/MPI_Win_set_errhandler.3.php">MPI_Win_set_errhandler</a>; the predefined error handler
MPI_ERRORS_RETURN may be used to cause error values to be returned. Note
that MPI does not guarantee that an MPI program can continue past an error.

<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<a href="../man3/MPI_Win_post.3.php">MPI_Win_post</a> <a href="../man3/MPI_Win_complete.3.php">MPI_Win_complete</a> <br>

<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
