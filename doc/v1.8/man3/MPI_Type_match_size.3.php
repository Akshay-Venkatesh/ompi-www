<?php
$topdir = "../../..";
$title = "MPI_Type_match_size(3) man page (version 1.8.4)";
$meta_desc = "Open MPI v1.8.4 man page: MPI_TYPE_MATCH_SIZE(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>

<p> <b>MPI_Type_match_size</b> - Returns an MPI datatype of a given type

<p>and size
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<p>
<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Type_match_size(int typeclass, int size,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype *type)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_TYPE_MATCH_SIZE(TYPECLASS, SIZE, TYPE, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;TYPECLASS, SIZE, TYPE, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
static MPI::Datatype MPI::Match_size(int typeclass, int size)
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>typeclass </dt>
<dd>Generic type specifier (integer). </dd>

<dt>size </dt>
<dd>Size, in
bytes, of representation (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>type </dt>
<dd>Datatype with
correct type and size (handle). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
The function returns an MPI datatype matching a local variable
of type (<i>typeclass</i>, <i>size</i>). The returned type is a reference (handle) to
a predefined named datatype, not a duplicate. This type cannot be freed.
<p>
The value of <i>typeclass</i> may be set to one of MPI_TYPECLASS_REAL, MPI_TYPECLASS_INTEGER,
or MPI_TYPECLASS_COMPLEX, corresponding to the desired datatype. <p>
MPI_type_match_size
can be used to obtain a size-specific type that matches a Fortran numeric
intrinsic type: first call <a href="../man3/MPI_Sizeof.3.php">MPI_Sizeof</a> to compute the variable size, then
call MPI_Type_match_size to find a suitable datatype. In C and C++, use
the sizeof builtin instead of <a href="../man3/MPI_Sizeof.3.php">MPI_Sizeof</a>. <p>
It is erroneous to specify a size
not supported by the compiler.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines return an
error value; C routines as the value of the function and Fortran routines
in the last argument. C++ functions do not return errors. If the default
error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the
C++ exception mechanism will be used to throw an MPI::Exception object.
<p>
Before the error value is returned, the current MPI error handler is called.
By default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error.  <p>
See the MPI man page for a full list of MPI error
codes.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<br>
<pre><a href="../man3/MPI_Sizeof.3.php">MPI_Sizeof</a>
<a href="../man3/MPI_Type_get_extent.3.php">MPI_Type_get_extent</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
