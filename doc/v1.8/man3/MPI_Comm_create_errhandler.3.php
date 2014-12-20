<?php
$topdir = "../../..";
$title = "MPI_Comm_create_errhandler(3) man page (version 1.8.4)";
$meta_desc = "Open MPI v1.8.4 man page: MPI_COMM_CREATE_ERRHANDLER(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Comm_create_errhandler </b> - Creates an error handler that can
be attached to communicators.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Comm_create_errhandler(MPI_Comm_errhandler_function *function,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Errhandler *errhandler)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_COMM_CREATE_ERRHANDLER(FUNCTION, ERRHANDLER, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;EXTERNAL<tt> </tt>&nbsp;<tt> </tt>&nbsp;FUNCTION
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;ERRHANDLER, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
static MPI::Errhandler
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI::Comm::Create_errhandler(MPI::Comm::Errhandler_function*
<tt> </tt>&nbsp;<tt> </tt>&nbsp;function)
</pre>
<h2><a name='sect5' href='#toc5'>Deprecated Type Name Note</a></h2>
MPI-2.2 deprecated the MPI_Comm_errhandler_fn and
MPI::Comm::Errhandler_fn types in favor of MPI_Comm_errhandler_function
and MPI::Comm::Errhandler_function, respectively.  Open MPI supports both
names (indeed, the _fn names are typedefs to the _function names).
<p>
<h2><a name='sect6' href='#toc6'>Input
Parameter</a></h2>

<dl>

<dt>function </dt>
<dd>User-defined error handling procedure (function).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Output
Parameters</a></h2>

<dl>

<dt>errhandler </dt>
<dd>MPI error handler (handle). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error
status (integer).
<p> </dd>
</dl>

<h2><a name='sect8' href='#toc8'>Description</a></h2>
MPI_Comm_create_errhandler creates an error
handler that can be attached to communicators. This function is identical
to <a href="../man3/MPI_Errhandler_create.3.php">MPI_Errhandler_create</a>, the use of which is deprecated.  <p>
In C, the user
routine should be a function of type MPI_Comm_errhandler_function, which
is defined as  <p>
<br>
<pre>    typedef void MPI_Comm_errhandler_function(MPI_Comm *, int *, ...);
</pre><p>
The first argument is the communicator in use. The second is the error code
to be returned by the MPI routine that raised the error. This typedef replaces
MPI_Handler_function, the use of which is deprecated.  <p>
In Fortran, the user
routine should be of this form: <p>
<br>
<pre>    SUBROUTINE COMM_ERRHANDLER_FUNCTION(COMM, ERROR_CODE, ...)
        INTEGER COMM, ERROR_CODE
</pre><p>
In C++, the user routine should be of this form: <p>
<br>
<pre>    typedef void MPI::Comm::Errhandler_function(MPI_Comm &amp;, int *, ...);
</pre>
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return an error value; C routines as the
value of the function and Fortran routines in the last argument. C++ functions
do not return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI::Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<p>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Deprecated Type Name Note</a></li>
<li><a name='toc6' href='#sect6'>Input Parameter</a></li>
<li><a name='toc7' href='#sect7'>Output Parameters</a></li>
<li><a name='toc8' href='#sect8'>Description</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
