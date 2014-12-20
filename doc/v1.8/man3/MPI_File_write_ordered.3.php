<?php
$topdir = "../../..";
$title = "MPI_File_write_ordered(3) man page (version 1.8.4)";
$meta_desc = "Open MPI v1.8.4 man page: MPI_FILE_WRITE_ORDERED(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_File_write_ordered</b> - Writes a file at a location specified
by a shared file pointer (blocking, collective).
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>
C Syntax <br>
<pre>    #include &lt;mpi.h&gt;
    int MPI_File_write_ordered(MPI_File fh, const void *buf,
    <tt> </tt>&nbsp;<tt> </tt>&nbsp;      <tt> </tt>&nbsp;<tt> </tt>&nbsp;   int count, MPI_Datatype datatype,
    <tt> </tt>&nbsp;<tt> </tt>&nbsp;      <tt> </tt>&nbsp;<tt> </tt>&nbsp;   MPI_Status *status)
</pre>
<h2><a name='sect2' href='#toc2'>Fortran Syntax</a></h2>
<br>
<pre>    INCLUDE &rsquo;mpif.h&rsquo;
    MPI_FILE_WRITE_ORDERED(FH, BUF, COUNT, DATATYPE,
    <tt> </tt>&nbsp;<tt> </tt>&nbsp;      <tt> </tt>&nbsp;<tt> </tt>&nbsp;   STATUS, IERROR)
    <tt> </tt>&nbsp;<tt> </tt>&nbsp;      &lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;  BUF(*)
    <tt> </tt>&nbsp;<tt> </tt>&nbsp;      INTEGER <tt> </tt>&nbsp;<tt> </tt>&nbsp;  FH, COUNT, DATATYPE, STATUS(MPI_STATUS_SIZE), IERROR
</pre>
<h2><a name='sect3' href='#toc3'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::File::Write_ordered(const void* buf, int count,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Datatype&amp; datatype, MPI::Status&amp; status)
void MPI::File::Write_ordered(const void* buf, int count,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Datatype&amp; datatype)
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameters</a></h2>

<dl>

<dt>fh     </dt>
<dd>File handle (handle). </dd>

<dt>buf </dt>
<dd>Initial address of buffer
(choice). </dd>

<dt>count </dt>
<dd>Number of elements in buffer (integer). </dd>

<dt>datatype </dt>
<dd>Data type
of each buffer element (handle).
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output Parameters</a></h2>

<dl>

<dt>status </dt>
<dd>Status object
(Status). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
MPI_File_write_ordered
is a collective routine. This routine must be called by all processes in
the communicator group associated with the file handle  <i>fh.</i> Each process
may pass different argument values for the  <i>datatype</i>  and  <i>count</i>  arguments.
Each process attempts to write, into the file associated with  <i>fh,</i> a total
number of  <i>count</i>  data items having datatype type contained in the user&rsquo;s
buffer  <i>buf.</i> For each process, the location in the file at which data is
written is the position at which the shared file pointer would be after
all processes whose ranks within the group are less than that of this process
had written their data. MPI_File_write_ordered returns the number of <i>datatype</i>
 elements written in  <i>status.</i> The shared file pointer is updated by the
amounts of data requested by all processes of the group.
<p>
<h2><a name='sect7' href='#toc7'>Errors</a></h2>
Almost all
MPI routines return an error value; C routines as the value of the function
and Fortran routines in the last argument. C++ functions do not return errors.
If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then
on error the C++ exception mechanism will be used to throw an MPI::Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. For MPI I/O function errors, the default error handler is set
to MPI_ERRORS_RETURN. The error handler may be changed with <a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a>;
the predefined error handler MPI_ERRORS_ARE_FATAL may be used to make I/O
errors fatal. Note that MPI does not guarantee that an MPI program can continue
past an error.
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>Fortran Syntax</a></li>
<li><a name='toc3' href='#sect3'>C++ Syntax</a></li>
<li><a name='toc4' href='#sect4'>Input Parameters</a></li>
<li><a name='toc5' href='#sect5'>Output Parameters</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
