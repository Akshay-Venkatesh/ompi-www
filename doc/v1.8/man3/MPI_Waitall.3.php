<?php
$topdir = "../../..";
$title = "MPI_Waitall(3) man page (version 1.8.4)";
$meta_desc = "Open MPI v1.8.4 man page: MPI_WAITALL(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Waitall</b> - Waits for all given communications to complete.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C
Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Waitall(int count, MPI_Request array_of_requests[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Status *array_of_statuses)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_WAITALL(COUNT, ARRAY_OF_REQUESTS, ARRAY_OF_STATUSES, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, ARRAY_OF_REQUESTS(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;ARRAY_OF_STATUSES(MPI_STATUS_SIZE,*), IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
static void Request::Waitall(int count, Request array_of_requests[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;Status array_of_statuses[])
static void Request::Waitall(int count, Request array_of_requests[])
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>count       </dt>
<dd>Lists length (integer). </dd>

<dt>array_of_requests </dt>
<dd>Array
of requests (array of handles). <p>
</dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>array_of_statuses  </dt>
<dd>Array
of status objects (array of status). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
Blocks until all communication operations associated with
active handles in the list complete, and returns the status of all these
operations (this includes the case where no handle in the list is active).
Both arrays have the same number of valid entries. The ith entry in array_of_statuses
is set to the return status of the ith operation. Requests that were created
by nonblocking communication operations are deallocated, and the corresponding
handles in the array are set to MPI_REQUEST_NULL. The list may contain null
or inactive handles. The call sets to empty the status of each such entry.
 <p>
The error-free execution of MPI_Waitall(count, array_of_requests, array_of_statuses)
has the same effect as the execution of  <a href="../man3/MPI_Wait.3.php">MPI_Wait</a>(&amp;array_of_request[i],
&amp;array_of_statuses[i]), for i=0,...,count-1, in some arbitrary order. MPI_Waitall
with an array of length 1 is equivalent to <a href="../man3/MPI_Wait.3.php">MPI_Wait</a>. <p>
When one or more of
the communications completed by a call to MPI_Waitall fail, it is desirable
to return specific information on each communication. The function MPI_Waitall
will return in such case the error code MPI_ERR_IN_STATUS and will set
the error field of each status to a specific error code. This code will
be MPI_SUCCESS if the specific communication completed; it will be another
specific error code if it failed; or it can be MPI_ERR_PENDING if it has
neither failed nor completed. The function MPI_Waitall will return MPI_SUCCESS
if no request had an error, or will return another error code if it failed
for other reasons (such as invalid arguments). In such cases, it will not
update the error fields of the statuses.  <p>
If your application does not need
to examine the <i>array_of_statuses</i> field, you can save resources by using
the predefined constant MPI_STATUSES_IGNORE can be used as a special value
for the <i>array_of_statuses</i> argument.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
For each invocation of MPI_Waitall,
if one or more requests generate an MPI exception, only the <i>first</i> MPI request
that caused an exception will be passed to its corresponding error handler.
 No other error handlers will be invoked (even if multiple requests generated
exceptions).  However, <i>all</i> requests that generate an exception will have
a relevant error code set in the corresponding status.MPI_ERROR field (unless
MPI_STATUSES_IGNORE was used). <p>
The default error handler aborts the MPI
job, except for I/O function errors. The error handler may be changed with
<a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>, <a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a>, or <a href="../man3/MPI_Win_set_errhandler.3.php">MPI_Win_set_errhandler</a>
(depending on the type of MPI handle that generated the MPI request); the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error. <p>
If the invoked error handler allows MPI_Waitall
to return to the caller, the value MPI_ERR_IN_STATUS will be returned in
the C and Fortran bindings.  In C++, if the predefined error handler MPI::ERRORS_THROW_EXCEPTIONS
is used, the value MPI::ERR_IN_STATUS will be contained in the MPI::Exception
object.  The MPI_ERROR field can then be examined in the array of returned
statuses to determine exactly which request(s) generated an exception.
<p>

<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<p>
<a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a> <br>
<a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a> <br>
<a href="../man3/MPI_Test.3.php">MPI_Test</a> <br>
<a href="../man3/MPI_Testall.3.php">MPI_Testall</a> <br>
<a href="../man3/MPI_Testany.3.php">MPI_Testany</a> <br>
<a href="../man3/MPI_Testsome.3.php">MPI_Testsome</a> <br>
<a href="../man3/MPI_Wait.3.php">MPI_Wait</a> <br>
<a href="../man3/MPI_Waitany.3.php">MPI_Waitany</a> <br>
<a href="../man3/MPI_Waitsome.3.php">MPI_Waitsome</a> <br>
<a href="../man3/MPI_Win_set_errhandler.3.php">MPI_Win_set_errhandler</a> <br>

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
