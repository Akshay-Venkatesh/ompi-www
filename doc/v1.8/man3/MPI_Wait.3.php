<?php
$topdir = "../../..";
$title = "MPI_Wait(3) man page (version 1.8.4)";
$meta_desc = "Open MPI v1.8.4 man page: MPI_WAIT(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
    <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Wait</b> - Waits for an MPI send or receive to complete.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C
Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Wait(MPI_Request *request, MPI_Status *status)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_WAIT(REQUEST, STATUS, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;REQUEST, STATUS(MPI_STATUS_SIZE), IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Request::Wait(Status&amp; status)
void Request::Wait()
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameter</a></h2>

<dl>

<dt>request       </dt>
<dd>Request (handle). <p>
</dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>status
     </dt>
<dd>Status object (status). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
A call to MPI_Wait returns when the operation identified by
request is complete. If the communication object associated with this request
was created by a nonblocking send or receive call, then the object is deallocated
by the call to MPI_Wait and the request handle is set to MPI_REQUEST_NULL.
 <p>
The call returns, in status, information on the completed operation. The
content of the status object for a receive operation can be accessed as
described in Section 3.2.5 of the MPI-1 Standard, "Return Status." The status
object for a send operation may be queried by a call to <a href="../man3/MPI_Test_cancelled.3.php">MPI_Test_cancelled</a>
(see Section 3.8 of the MPI-1 Standard, "Probe and Cancel"). <p>
If your application
does not need to examine the <i>status</i> field, you can save resources by using
the predefined constant MPI_STATUS_IGNORE as a special value for the <i>status</i>
argument.  <p>
One is allowed to call MPI_Wait with a null or inactive request
argument. In this case the operation returns immediately with empty status.

<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
Successful return of MPI_Wait after an <a href="../man3/MPI_Ibsend.3.php">MPI_Ibsend</a> implies that the
user send buffer can be reused  i.e., data has been sent out or copied into
a buffer attached with <a href="../man3/MPI_Buffer_attach.3.php">MPI_Buffer_attach</a>. Note that, at this point, we can
no longer cancel the send (for more information, see Section 3.8 of the
MPI-1 Standard, "Probe and Cancel"). If a matching receive is never posted,
then the buffer cannot be freed. This runs somewhat counter to the stated
goal of <a href="../man3/MPI_Cancel.3.php">MPI_Cancel</a> (always being able to free program space that was committed
to the communication subsystem).  <p>
Example: Simple usage of nonblocking operations
and  MPI_Wait.  <p>
<br>
<pre>    CALL <a href="../man3/MPI_Comm_rank.3.php">MPI_COMM_RANK</a>(comm, rank, ierr)
    IF(rank.EQ.0) THEN
        CALL <a href="../man3/MPI_Isend.3.php">MPI_ISEND</a>(a(1), 10, MPI_REAL, 1, tag, comm, request, ierr)

        **** do some computation ****
        CALL MPI_WAIT(request, status, ierr)
    ELSE
        CALL <a href="../man3/MPI_Irecv.3.php">MPI_IRECV</a>(a(1), 15, MPI_REAL, 0, tag, comm, request, ierr)

        **** do some computation ****
        CALL MPI_WAIT(request, status, ierr)
    END IF
</pre>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return an error value; C routines as the
value of the function and Fortran routines in the last argument. C++ functions
do not return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI::Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>,
<a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a>, or <a href="../man3/MPI_Win_set_errhandler.3.php">MPI_Win_set_errhandler</a> (depending on the type
of MPI handle that generated the request); the predefined error handler
MPI_ERRORS_RETURN may be used to cause error values to be returned. Note
that MPI does not guarantee that an MPI program can continue past an error.
<p>
Note that per MPI-1 section 3.2.5, MPI exceptions on requests passed to MPI_WAIT
do not set the status.MPI_ERROR field in the returned status.  The error
code is passed to the back-end error handler and may be passed back to the
caller through the return value of MPI_WAIT if the back-end error handler
returns it.  The pre-defined MPI error handler MPI_ERRORS_RETURN exhibits
this behavior, for example.
<p>
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<p>
<a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a> <br>
<a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a> <br>
<a href="../man3/MPI_Test.3.php">MPI_Test</a> <br>
<a href="../man3/MPI_Testall.3.php">MPI_Testall</a> <br>
<a href="../man3/MPI_Testany.3.php">MPI_Testany</a> <br>
<a href="../man3/MPI_Testsome.3.php">MPI_Testsome</a> <br>
<a href="../man3/MPI_Waitall.3.php">MPI_Waitall</a> <br>
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
<li><a name='toc5' href='#sect5'>Input Parameter</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
<li><a name='toc10' href='#sect10'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
