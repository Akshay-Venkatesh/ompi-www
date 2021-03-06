<?
$subject_val = "Re: [OMPI devel] Open MPI 1.8.6 memory leak";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Jul 10 11:26:43 2015" -->
<!-- isoreceived="20150710152643" -->
<!-- sent="Fri, 10 Jul 2015 17:26:21 +0200" -->
<!-- isosent="20150710152621" -->
<!-- name="Nick Papior" -->
<!-- email="nickpapior_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Open MPI 1.8.6 memory leak" -->
<!-- id="CAAbhqc44rMn76rP2PV1duYzRbFKwnphXT2F+L28fJuGY+Wb5hw_at_mail.gmail.com" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="55949BD1.1020605_at_rist.or.jp" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>Subject:</strong> Re: [OMPI devel] Open MPI 1.8.6 memory leak<br>
<strong>From:</strong> Nick Papior (<em>nickpapior_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-07-10 11:26:21
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17625.php">Paul Hargrove: "Re: [OMPI devel] 1.8.7rc1 testing results"</a>
<li><strong>Previous message:</strong> <a href="17623.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 1.8.7rc1 testing results"</a>
<li><strong>In reply to:</strong> <a href="17593.php">Gilles Gouaillardet: "Re: [OMPI devel] Open MPI 1.8.6 memory leak"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Just want to confirm.
<br>
<p>I also see this memory leak on 1.8.6, using 1.8.7rc1 fixes this memory leak.
<br>
<p><p>2015-07-02 4:02 GMT+02:00 Gilles Gouaillardet &lt;gilles_at_[hidden]&gt;:
<br>
<p><span class="quotelev1">&gt;  Nathan,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; the root cause is your fixes were not backported to the v1.8 (nor the
</span><br>
<span class="quotelev1">&gt; v1.10) branch
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; i made PR <a href="https://github.com/open-mpi/ompi-release/pull/357">https://github.com/open-mpi/ompi-release/pull/357</a> to fix this.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; could you please review it ?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; since there are quite a lot of differences between v1.8 and master, the
</span><br>
<span class="quotelev1">&gt; backport was not trivial.
</span><br>
<span class="quotelev1">&gt; i left some #if 0 in the code since i do not know if something need to be
</span><br>
<span class="quotelev1">&gt; done about rdma fragments
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Cheers,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Gilles
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On 7/2/2015 6:04 AM, Nathan Hjelm wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Don't see the leak on master with OS X using the leaks command. Will see
</span><br>
<span class="quotelev1">&gt; what valgrind finds on linux.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; -Nathan
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Wed, Jul 01, 2015 at 08:48:57PM +0000, Rolf vandeVaart wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;     There have been two reports on the user list about memory leaks.  I have
</span><br>
<span class="quotelev1">&gt;    reproduced this leak with LAMMPS.  Note that this has nothing to do with
</span><br>
<span class="quotelev1">&gt;    CUDA-aware features.  The steps that Stefan has provided make it easy to
</span><br>
<span class="quotelev1">&gt;    reproduce.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;    Here are some more specific steps to reproduce derived from Stefan.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;    1. clone LAMMPS (git clone git://git.lammps.org/lammps-ro.git lammps)
</span><br>
<span class="quotelev1">&gt;    2. cd src/, compile with openMPI 1.8.6.  To do this, set your path to Open
</span><br>
<span class="quotelev1">&gt;    MPI and type &quot;make mpi&quot;
</span><br>
<span class="quotelev1">&gt;    3. run the example listed in lammps/examples/melt. To do this, first copy
</span><br>
<span class="quotelev1">&gt;    &quot;lmp_mpi&quot; from the src directory into the melt directory.  Then you need
</span><br>
<span class="quotelev1">&gt;    to modify the in.melt file so that it will run for a while.  Change
</span><br>
<span class="quotelev1">&gt;    &quot;run 25&quot; to &quot;run        250000&quot;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;    4. you can run by mpirun -np 2 lmp_mpi &lt; in.melt
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;    For reference, here is both 1.8.5 and 1.8.6 memory consumption.  1.8.5
</span><br>
<span class="quotelev1">&gt;    stays very stable where 1.8.6 almost triples after 6 minutes of running.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;    Open MPI 1.8.5
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26907 59.0  0.0 329672 14584 pts/16   Rl   16:24   0:00
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26908 60.0  0.0 329672 14676 pts/16   Rl   16:24   0:00
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26907 98.3  0.0 329672 14932 pts/16   Rl   16:24   0:30
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26908 98.5  0.0 329672 14932 pts/16   Rl   16:24   0:30
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26907 98.9  0.0 329672 14960 pts/16   Rl   16:24   1:00
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26908 99.1  0.0 329672 14952 pts/16   Rl   16:24   1:00
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26907 99.1  0.0 329672 14960 pts/16   Rl   16:24   1:30
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26908 99.3  0.0 329672 14952 pts/16   Rl   16:24   1:30
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26907 99.2  0.0 329672 14960 pts/16   Rl   16:24   2:00
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26908 99.4  0.0 329672 14952 pts/16   Rl   16:24   2:00
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26907 99.3  0.0 329672 14960 pts/16   Rl   16:24   2:30
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26908 99.5  0.0 329672 14952 pts/16   Rl   16:24   2:30
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26907 99.4  0.0 329672 14960 pts/16   Rl   16:24   2:59
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26908 99.5  0.0 329672 14952 pts/16   Rl   16:24   3:00
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26907 99.4  0.0 329672 14960 pts/16   Rl   16:24   3:29
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26908 99.6  0.0 329672 14956 pts/16   Rl   16:24   3:30
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26907 99.4  0.0 329672 14960 pts/16   Rl   16:24   3:59
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26908 99.6  0.0 329672 14956 pts/16   Rl   16:24   4:00
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26907 99.4  0.0 329672 14960 pts/16   Rl   16:24   4:29
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26908 99.6  0.0 329672 14956 pts/16   Rl   16:24   4:30
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26907 99.5  0.0 329672 14960 pts/16   Rl   16:24   4:59
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26908 99.6  0.0 329672 14956 pts/16   Rl   16:24   5:00
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26907 99.5  0.0 329672 14960 pts/16   Rl   16:24   5:29
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26908 99.6  0.0 329672 14956 pts/16   Rl   16:24   5:29
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26907 99.5  0.0 329672 14960 pts/16   Rl   16:24   5:59
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26908 99.6  0.0 329672 14956 pts/16   Rl   16:24   5:59
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_185_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;    Open MPI 1.8.6
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26755  0.0  0.0 330288 15368 pts/16   Rl   16:10   0:00
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26756  0.0  0.0 330284 15376 pts/16   Rl   16:10   0:00
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26755  100  0.0 409856 94976 pts/16   Rl   16:10   0:30
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26756  100  0.0 409848 94904 pts/16   Rl   16:10   0:30
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26755  100  0.1 489292 174320 pts/16  Rl   16:10   1:00
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26756  100  0.1 489288 174536 pts/16  Rl   16:10   1:00
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26755 99.9  0.1 568860 253928 pts/16  Rl   16:10   1:29
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26756  100  0.1 568984 254168 pts/16  Rl   16:10   1:30
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26755 99.9  0.2 648620 333800 pts/16  Rl   16:10   1:59
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26756  100  0.2 648616 333868 pts/16  Rl   16:10   2:00
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26755 99.8  0.3 728444 413516 pts/16  Rl   16:10   2:29
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26756  100  0.3 728376 413800 pts/16  Rl   16:10   2:30
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26755 99.8  0.3 808332 493388 pts/16  Rl   16:10   2:59
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26756 99.9  0.3 808328 493432 pts/16  Rl   16:10   2:59
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26755 99.7  0.4 888156 573260 pts/16  Rl   16:10   3:29
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26756 99.9  0.4 888088 573328 pts/16  Rl   16:10   3:29
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26755 99.7  0.4 968108 653396 pts/16  Rl   16:10   3:59
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26756 99.9  0.4 968232 653488 pts/16  Rl   16:10   3:59
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26755 99.7  0.5 1048252 733268 pts/16 Rl   16:10   4:29
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26756 99.9  0.5 1048248 733384 pts/16 Rl   16:10   4:29
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26755 99.7  0.6 1128396 813404 pts/16 Rl   16:10   4:59
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26756 99.9  0.6 1128328 813544 pts/16 Rl   16:10   4:59
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26755 99.7  0.6 1208736 893804 pts/16 Rl   16:10   5:29
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26756 99.9  0.6 1208668 893968 pts/16 Rl   16:10   5:29
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
</span><br>
<span class="quotelev1">&gt;    32341    26755 99.7  0.7 1288880 973940 pts/16 Rl   16:10   5:59
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;    32341    26756 99.9  0.7 1288812 974128 pts/16 Rl   16:10   5:59
</span><br>
<span class="quotelev1">&gt;    ./lmp_mpi_186_nocuda
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;      ----------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;    This email message is for the sole use of the intended recipient(s) and
</span><br>
<span class="quotelev1">&gt;    may contain confidential information.  Any unauthorized review, use,
</span><br>
<span class="quotelev1">&gt;    disclosure or distribution is prohibited.  If you are not the intended
</span><br>
<span class="quotelev1">&gt;    recipient, please contact the sender by reply email and destroy all copies
</span><br>
<span class="quotelev1">&gt;    of the original message.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;      ----------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;   _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing listdevel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2015/07/17590.php">http://www.open-mpi.org/community/lists/devel/2015/07/17590.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing listdevel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2015/07/17591.php">http://www.open-mpi.org/community/lists/devel/2015/07/17591.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/07/17593.php">http://www.open-mpi.org/community/lists/devel/2015/07/17593.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><p><p><pre>
-- 
Kind regards Nick
</pre>
<hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-17624/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17625.php">Paul Hargrove: "Re: [OMPI devel] 1.8.7rc1 testing results"</a>
<li><strong>Previous message:</strong> <a href="17623.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 1.8.7rc1 testing results"</a>
<li><strong>In reply to:</strong> <a href="17593.php">Gilles Gouaillardet: "Re: [OMPI devel] Open MPI 1.8.6 memory leak"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>
