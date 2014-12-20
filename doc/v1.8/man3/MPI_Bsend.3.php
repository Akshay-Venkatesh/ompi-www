<?php
$topdir = "../../..";
$title = "MPI_Bsend(3) man page (version 1.8.4)";
$meta_desc = "Open MPI v1.8.4 man page: MPI_BSEND(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Bsend</b> - Basic send with user-specified buffering.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Bsend(const void *buf, int count, MPI_Datatype datatype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int dest, int tag, MPI_Comm comm)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_BSEND(BUF, COUNT,DATATYPE, DEST, TAG, COMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;BUF(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, DATATYPE, DEST, TAG, COMM, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Comm::Bsend(const void* buf, int count, const
<tt> </tt>&nbsp;<tt> </tt>&nbsp;Datatype&amp; datatype, int dest, int tag) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>buf </dt>
<dd>Initial address of send buffer (choice). </dd>

<dt>count </dt>
<dd>Number
of entries in send buffer (nonnegative integer). </dd>

<dt>datatype </dt>
<dd>Datatype of each
send buffer element (handle). </dd>

<dt>dest </dt>
<dd>Rank of destination (integer). </dd>

<dt>tag </dt>
<dd>Message
tag (integer). </dd>

<dt>comm </dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran
only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Bsend performs a buffered-mode,
blocking send.
<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
This send is provided as a convenience function; it
allows the user to send messages without worrying about where they are
buffered (because the user must have provided buffer space with <a href="../man3/MPI_Buffer_attach.3.php">MPI_Buffer_attach</a>).
<p>
In deciding how much buffer space to allocate, remember that the buffer
space is not available for reuse by subsequent <i>MPI_Bsend</i>s unless you are
certain that the message has been received (not just that it should have
been received).  For example, this code does not allocate enough buffer
space: <br>
<pre>    <a href="../man3/MPI_Buffer_attach.3.php">MPI_Buffer_attach</a>( b, n*sizeof(double) + MPI_BSEND_OVERHEAD );
    for (i=0; i&lt;m; i++) {
        MPI_Bsend( buf, n, MPI_DOUBLE, ... );
    }
</pre>because only enough buffer space is provided for a single send, and the
loop may start a second  <i>MPI_Bsend</i> before the first is done making use
of the buffer.
<p> In C, you can force the messages to be delivered by <a href="../man3/MPI_Buffer_detach.3.php">MPI_Buffer_detach</a>(
&amp;b, &amp;n ); <a href="../man3/MPI_Buffer_attach.3.php">MPI_Buffer_attach</a>( b, n ); (The  <i><a href="../man3/MPI_Buffer_detach.3.php">MPI_Buffer_detach</a></i> will not complete
until all buffered messages are delivered.)
<p>
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
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
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<br>
<pre><a href="../man3/MPI_Buffer_attach.3.php">MPI_Buffer_attach</a>
<a href="../man3/MPI_Ibsend.3.php">MPI_Ibsend</a>
<a href="../man3/MPI_Bsend_init.3.php">MPI_Bsend_init</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
