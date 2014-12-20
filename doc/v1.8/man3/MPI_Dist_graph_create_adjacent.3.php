<?php
$topdir = "../../..";
$title = "MPI_Dist_graph_create_adjacent(3) man page (version 1.8.4)";
$meta_desc = "Open MPI v1.8.4 man page: MPI_DIST_GRAPH_CREATE_ADJACENT(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Dist_graph_create_adjacent </b> - Makes a new communicator to
which topology information has been attached.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Dist_graph_create_adjacent(MPI_Comm comm_old, int indegree, const
int sources[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const int sourceweights[], int outdegree, const int destinations[], const
int destweights[],
        MPI_Info info, int reorder, MPI_Comm *comm_dist_graph)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_DIST_GRAPH_CREATE_ADJACENT(COMM_OLD, INDEGREE, SOURCES, SOURCEWEIGHTS,
OUTDEGREE,
                DESTINATIONS, DESTWEIGHTS, INFO, REORDER, COMM_DIST_GRAPH,
IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM_OLD, INDEGREE, SOURCES(*), SOURCEWEIGHTS(*), OUTDEGREE, DESTINATIONS(*),
DESTWEIGHTS(*), INFO
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM_DIST_GRAPH, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;LOGICAL REORDER
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameters</a></h2>

<dl>

<dt>comm_old </dt>
<dd>Input communicator without topology (handle). </dd>

<dt>indegree
</dt>
<dd>Size of <i>sources</i> and <i>sourceweights</i> arrays (non-negative integer). </dd>

<dt>sources
</dt>
<dd>Ranks of processes for which the calling process is a destination (array
of non-negative integers). </dd>

<dt>sourceweights </dt>
<dd>Weights of the edges into the calling
process (array of non-negative integers). </dd>

<dt>outdegree </dt>
<dd>Size of <i>destinations</i>
and <i>destweights</i> arrays (non-negative integer). </dd>

<dt>destinations </dt>
<dd>Ranks of processes
for which the calling process is a source (array of non-negative integers).
</dd>

<dt>destweights </dt>
<dd>Weights of the edges out of the calling process (array of non-negative
integers). </dd>

<dt>Hints on optimization and interpretation of weights (handle).
</dt>
<dd></dd>

<dt>reorder </dt>
<dd>Ranking may be reordered (true) or not (false) (logical).
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output
Parameters</a></h2>

<dl>

<dt>comm_dist_graph </dt>
<dd>Communicator with distibuted graph topology added
(handle). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
MPI_Dist_graph_create_adjacent
creats a new communicator <i>comm_dist_graph</i> with distrubuted graph topology
and returns a handle to the new communicator. The number of processes in
<i>comm_dist_graph</i> is identical to the number of processes in <i>comm_old</i>. Each
process passes all information about its incoming and outgoing edges in
the virtual distributed graph topology. The calling processes must ensure
that each edge of the graph is described in the source and in the destination
process with the same weights. If there are multiple edges for a given (source,dest)
pair, then the sequence of the weights of these edges does not matter. The
complete communication topology is the combination of all edges shown in
the <i>sources</i> arrays of all processes in comm_old, which must be identical
to the combination of all edges shown in the <i>destinations</i> arrays. Source
and destination ranks must be process ranks of comm_old. This allows a fully
distributed specication of the communication graph. Isolated processes (i.e.,
processes with no outgoing or incoming edges, that is, processes that have
specied indegree and outdegree as zero and thus do not occur as source
or destination rank in the graph specication) are allowed. The call to MPI_Dist_graph_create_adjacent
is collective.
<p>
<h2><a name='sect7' href='#toc7'>Weights</a></h2>
Weights are specied as non-negative integers and can
be used to influence the process remapping strategy and other internal
MPI optimizations. For instance, approximate count arguments of later communication
calls along specic edges could be used as their edge weights. Multiplicity
of edges can likewise indicate more intense communication between pairs
of processes. However, the exact meaning of edge weights is not specied
by the MPI standard and is left to the implementation. An application can
supply the special value MPI_UNWEIGHTED for the weight array to indicate
that all edges have the same (effectively no) weight. It is erroneous to
supply MPI_UNWEIGHTED for some but not all processes of comm_old. If the
graph is weighted but <i>indegree</i> or <i>outdegree</i> is zero, then MPI_WEIGHTS_EMPTY
or any arbitrary array may be passed to sourceweights or destweights respectively.
Note that MPI_UNWEIGHTED and MPI_WEIGHTS_EMPTY are not special weight values;
rather they are special values for the total array argument. In Fortran,
MPI_UNWEIGHTED and MPI_WEIGHTS_EMPTY are objects like MPI_BOTTOM (not usable
for initialization or assignment). See MPI-3 �&sect; 2.5.4.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI
routines return an error value; C routines as the value of the function
and Fortran routines in the last argument. <p>
Before the error value is returned,
the current MPI error handler is called. By default, this error handler
aborts the MPI job, except for I/O function errors. The error handler may
be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined error handler MPI_ERRORS_RETURN
may be used to cause error values to be returned. Note that MPI does not
guarantee that an MPI program can continue past an error.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<p>
<a href="../man3/MPI_Dist_graph_create.3.php">MPI_Dist_graph_create</a>

<p><a href="../man3/MPI_Dist_graph_neighbors.3.php">MPI_Dist_graph_neighbors</a> <a href="../man3/MPI_Dist_graph_neighbors_count.3.php">MPI_Dist_graph_neighbors_count</a>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>Input Parameters</a></li>
<li><a name='toc5' href='#sect5'>Output Parameters</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Weights</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
