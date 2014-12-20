<?php
$topdir = "../../..";
$title = "MPI_Ibcast(3) man page (version 1.8.4)";
$meta_desc = "Open MPI v1.8.4 man page: MPI_IBCAST(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b><a href="../man3/MPI_Bcast.3.php">MPI_Bcast</a>, MPI_Ibcast</b> - Broadcasts a message from the process with
rank <i>root</i> to all other processes of the group.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int <a href="../man3/MPI_Bcast.3.php">MPI_Bcast</a>(void *buffer, int count, MPI_Datatype datatype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int root, MPI_Comm comm)
int MPI_Ibcast(void *buffer, int count, MPI_Datatype datatype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int root, MPI_Comm comm, MPI_Request *request)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
<a href="../man3/MPI_Bcast.3.php">MPI_BCAST</a>(BUFFER, COUNT, DATATYPE, ROOT, COMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;BUFFER(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, DATATYPE, ROOT, COMM, IERROR
MPI_IBCAST(BUFFER, COUNT, DATATYPE, ROOT, COMM, REQUEST, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;BUFFER(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, DATATYPE, ROOT, COMM, REQUEST, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Comm::Bcast(void* buffer, int count,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Datatype&amp; datatype, int root) const = 0
</pre>
<h2><a name='sect5' href='#toc5'>Input/Output Parameters</a></h2>

<dl>

<dt>buffer </dt>
<dd>Starting address of buffer (choice). </dd>

<dt>count
</dt>
<dd>Number of entries in buffer (integer). </dd>

<dt>datatype </dt>
<dd>Data type of buffer (handle).
</dd>

<dt>root </dt>
<dd>Rank of broadcast root (integer). </dd>

<dt>comm </dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output
Parameters</a></h2>

<dl>

<dt>request </dt>
<dd>Request (handle, non-blocking only). </dd>

<dt>IERROR </dt>
<dd>Fortran only:
Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
<a href="../man3/MPI_Bcast.3.php">MPI_Bcast</a> broadcasts a message from
the process with rank root to all processes of the group, itself included.
It is called by all members of group using the same arguments for comm,
root. On return, the contents of root&rsquo;s communication buffer has been copied
to all processes.    <p>
General, derived datatypes are allowed for datatype.
The type signature of count, datatype on any process must be equal to the
type signature of count, datatype at the root. This implies that the amount
of data sent must be equal to the amount received, pairwise between each
process and the root. <a href="../man3/MPI_Bcast.3.php">MPI_Bcast</a> and all other data-movement collective routines
make this restriction. Distinct type maps between sender and receiver are
still allowed.  <p>
<b>Example:</b> Broadcast 100 ints from process 0 to every process
in the group. <br>
<pre>    MPI_Comm comm;
    int array[100];
    int root=0;
    ...
    <a href="../man3/MPI_Bcast.3.php">MPI_Bcast</a>( array, 100, MPI_INT, root, comm);
</pre><p>
As in many of our sample code fragments, we assume that some of the variables
(such as comm in the example above) have been assigned appropriate values.
<p>

<h2><a name='sect8' href='#toc8'>When Communicator is an Inter-communicator</a></h2>
<p>
When the communicator is an inter-communicator,
the root process in the first group broadcasts data to all the processes
in the second group.  The first group defines the root process.  That process
uses MPI_ROOT as the value of its <i>root</i> argument.  The remaining processes
use MPI_PROC_NULL as the value of their <i>root</i> argument.  All processes in
the second group use the rank of that root process in the first group as
the value of their <i>root</i> argument.   The receive buffer arguments of the
processes in the second group must be consistent with the send buffer argument
of the root process in the first group. <p>

<h2><a name='sect9' href='#toc9'>Notes</a></h2>
This function does not support
the in-place option. <p>

<p>
<p>
<p>
<h2><a name='sect10' href='#toc10'>Errors</a></h2>
Almost all MPI routines return an error value;
C routines as the value of the function and Fortran routines in the last
argument. C++ functions do not return errors. If the default error handler
is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception
mechanism will be used to throw an MPI::Exception object. <p>
Before the error
value is returned, the current MPI error handler is called. By default,
this error handler aborts the MPI job, except for I/O function errors. The
error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined
error handler MPI_ERRORS_RETURN may be used to cause error values to be
returned. Note that MPI does not guarantee that an MPI program can continue
past an error.
<p>  <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input/Output Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>When Communicator is an Inter-communicator</a></li>
<li><a name='toc9' href='#sect9'>Notes</a></li>
<li><a name='toc10' href='#sect10'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
