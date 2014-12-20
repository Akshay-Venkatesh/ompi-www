<?php
$topdir = "../../..";
$title = "MPI_Group_intersection(3) man page (version 1.8.4)";
$meta_desc = "Open MPI v1.8.4 man page: MPI_GROUP_INTERSECTION(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Group_intersection </b> - Produces a group at the intersection
of two existing groups.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Group_intersection(MPI_Group group1, MPI_Group group2,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Group *newgroup)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_GROUP_INTERSECTION(GROUP1, GROUP2, NEWGROUP, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;GROUP1, GROUP2, NEWGROUP, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
static Group Group::Intersect(const Group&amp; group1, const Group&amp; group2)
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>group1 </dt>
<dd>First group (handle). </dd>

<dt>group2 </dt>
<dd>Second group (handle).

<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>newgroup </dt>
<dd>Intersection group (handle). </dd>

<dt>IERROR </dt>
<dd>Fortran only:
Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
The set-like operations are defined
as follows: <br>

<dl>

<dt>  o </dt>
<dd>union -- All elements of the first group (group1), followed by all elements
of second group (group2) not in first. <br>
</dd>

<dt>  o </dt>
<dd>intersect -- all elements of the first group that are also in the second
group, ordered as in first group. <br>
</dd>

<dt>  o </dt>
<dd>difference -- all elements of the first group that are not in the second
group, ordered as in the first group.   </dd>
</dl>
<p>
Note that for these operations the
order of processes in the output group is determined primarily by order
in the first group (if possible) and then, if necessary, by order in the
second group. Neither union nor intersection are commutative, but both are
associative.  <p>
The new group can be empty, that is, equal to MPI_GROUP_EMPTY.

<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
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
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<a href="../man3/MPI_Group_free.3.php">MPI_Group_free</a> <br>

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
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
