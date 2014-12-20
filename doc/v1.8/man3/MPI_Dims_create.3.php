<?php
$topdir = "../../..";
$title = "MPI_Dims_create(3) man page (version 1.8.4)";
$meta_desc = "Open MPI v1.8.4 man page: MPI_DIMS_CREATE(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Dims_create </b> - Creates a division of processors in a Cartesian
grid.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Dims_create(int nnodes, int ndims, int dims[])
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_DIMS_CREATE(NNODES, NDIMS, DIMS, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;NNODES, NDIMS, DIMS(*), IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Compute_dims(int nnodes, int ndims, int dims[])
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>nnodes </dt>
<dd>Number of nodes in a grid (integer). </dd>

<dt>ndims </dt>
<dd>Number
of Cartesian dimensions (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>In/Out Parameter</a></h2>

<dl>

<dt>dims </dt>
<dd>Integer array of
size ndims specifying the number of nodes in each dimension.
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Output Parameter</a></h2>

<dl>

<dt>IERROR
</dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect8' href='#toc8'>Description</a></h2>
For Cartesian topologies,
the function MPI_Dims_create helps the user select a balanced distribution
of processes per coordinate direction, depending on the number of processes
in the group to be balanced and optional constraints that can be specified
by the user. One use is to partition all the processes (the size of MPI_COMM_WORLD&rsquo;s
group) into an n-dimensional topology.  <p>
The entries in the array <i>dims</i> are
set to describe a Cartesian grid with <i>ndims</i> dimensions and a total of <i>nnodes</i>
nodes. The dimensions are set to be as close to each other as possible,
using an appropriate divisibility algorithm. The caller may further constrain
the operation of this routine by specifying elements of array dims. If dims[i]
is set to a positive number, the routine will not modify the number of
nodes in dimension i; only those entries where  dims[i] = 0 are modified
by the call.    <p>
Negative input values of dims[i] are erroneous. An error
will occur if nnodes is not a multiple of ((pi) over (i, dims[i] != 0))
dims[i].    <p>
For dims[i] set by the call, dims[i] will be ordered in nonincreasing
order. Array dims is suitable for use as input to routine <a href="../man3/MPI_Cart_create.3.php">MPI_Cart_create</a>.
MPI_Dims_create is local.  <p>
<b>Example:</b> <br>
<pre>dims
before<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;dims
call<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;function call<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;on return
-----------------------------------------------------
(0,0)<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Dims_create(6, 2, dims)<tt> </tt>&nbsp;<tt> </tt>&nbsp;(3,2)
(0,0)<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Dims_create(7, 2, dims) <tt> </tt>&nbsp;<tt> </tt>&nbsp;(7,1)
(0,3,0)<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Dims_create(6, 3, dims)<tt> </tt>&nbsp;<tt> </tt>&nbsp;(2,3,1)
(0,3,0)<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Dims_create(7, 3, dims)<tt> </tt>&nbsp;<tt> </tt>&nbsp;erroneous call
------------------------------------------------------
</pre>
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
<li><a name='toc6' href='#sect6'>In/Out Parameter</a></li>
<li><a name='toc7' href='#sect7'>Output Parameter</a></li>
<li><a name='toc8' href='#sect8'>Description</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
