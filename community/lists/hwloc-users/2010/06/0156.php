<?
$subject_val = "Re: [hwloc-users] Problem with hwloc_set_thread_cpubind() and	pthread_barrier_wait() on new debianj";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Jun 16 09:02:05 2010" -->
<!-- isoreceived="20100616130205" -->
<!-- sent="Wed, 16 Jun 2010 15:02:00 +0200" -->
<!-- isosent="20100616130200" -->
<!-- name="Samuel Thibault" -->
<!-- email="samuel.thibault_at_[hidden]" -->
<!-- subject="Re: [hwloc-users] Problem with hwloc_set_thread_cpubind() and	pthread_barrier_wait() on new debianj" -->
<!-- id="20100616130200.GT4240_at_const" -->
<!-- charset="utf-8" -->
<!-- inreplyto="COL124-W536897049986F7114276B8D6DE0_at_phx.gbl" -->
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
<strong>Subject:</strong> Re: [hwloc-users] Problem with hwloc_set_thread_cpubind() and	pthread_barrier_wait() on new debianj<br>
<strong>From:</strong> Samuel Thibault (<em>samuel.thibault_at_[hidden]</em>)<br>
<strong>Date:</strong> 2010-06-16 09:02:00
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0157.php">Αλέξανδρος Παπαδογιαννάκης: "Re: [hwloc-users] Problem with hwloc_set_thread_cpubind()	and	pthread_barrier_wait() on new debianj"</a>
<li><strong>Previous message:</strong> <a href="0155.php">&#206;&#145;&#206;&#187;&#206;&#173;&#206;&#190;&#206;&#177;&#206;&#189;&#206;&#180;&#207;&#129;&#206;&#191;&#207;&#130; &#206;&#160;&#206;&#177;&#207;&#128;&#206;&#177;&#206;&#180;&#206;&#191;&#206;&#179;&#206;&#185;&#206;&#177;&#206;&#189;&#206;&#189;&#206;&#172;&#206;&#186;&#206;&#183;&#207;&#130;: "Re: [hwloc-users] Problem with hwloc_set_thread_cpubind() and	pthread_barrier_wait() on new debianj"</a>
<li><strong>In reply to:</strong> <a href="0155.php">&#206;&#145;&#206;&#187;&#206;&#173;&#206;&#190;&#206;&#177;&#206;&#189;&#206;&#180;&#207;&#129;&#206;&#191;&#207;&#130; &#206;&#160;&#206;&#177;&#207;&#128;&#206;&#177;&#206;&#180;&#206;&#191;&#206;&#179;&#206;&#185;&#206;&#177;&#206;&#189;&#206;&#189;&#206;&#172;&#206;&#186;&#206;&#183;&#207;&#130;: "Re: [hwloc-users] Problem with hwloc_set_thread_cpubind() and	pthread_barrier_wait() on new debianj"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0157.php">Αλέξανδρος Παπαδογιαννάκης: "Re: [hwloc-users] Problem with hwloc_set_thread_cpubind()	and	pthread_barrier_wait() on new debianj"</a>
<li><strong>Reply:</strong> <a href="0157.php">Αλέξανδρος Παπαδογιαννάκης: "Re: [hwloc-users] Problem with hwloc_set_thread_cpubind()	and	pthread_barrier_wait() on new debianj"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
&#206;&#145;&#206;&#187;&#206;&#173;&#206;&#190;&#206;&#177;&#206;&#189;&#206;&#180;&#207;&#129;&#206;&#191;&#207;&#130; &#206;&#160;&#206;&#177;&#207;&#128;&#206;&#177;&#206;&#180;&#206;&#191;&#206;&#179;&#206;&#185;&#206;&#177;&#206;&#189;&#206;&#189;&#206;&#172;&#206;&#186;&#206;&#183;&#207;&#130;, le Wed 16 Jun 2010 15:52:04 +0300, a &#195;&#169;crit :
<br>
<span class="quotelev1">&gt; hwloc_set_thread_cpubind() by itself works. I have it on a different test
</span><br>
<span class="quotelev1">&gt; program
</span><br>
<span class="quotelev1">&gt; and it binds the threads without a problem. The problem is when the thread is
</span><br>
<span class="quotelev1">&gt; waiting on a barrier.
</span><br>
<p>I understand. I'm just saying that concerning hwloc, being asleep or not
<br>
shouldn't change the behavior, and the bug is most probably either in
<br>
glibc or the kernel. The result of sched_setaffinity should tell us.
<br>
<p>Samuel
<br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0157.php">Αλέξανδρος Παπαδογιαννάκης: "Re: [hwloc-users] Problem with hwloc_set_thread_cpubind()	and	pthread_barrier_wait() on new debianj"</a>
<li><strong>Previous message:</strong> <a href="0155.php">&#206;&#145;&#206;&#187;&#206;&#173;&#206;&#190;&#206;&#177;&#206;&#189;&#206;&#180;&#207;&#129;&#206;&#191;&#207;&#130; &#206;&#160;&#206;&#177;&#207;&#128;&#206;&#177;&#206;&#180;&#206;&#191;&#206;&#179;&#206;&#185;&#206;&#177;&#206;&#189;&#206;&#189;&#206;&#172;&#206;&#186;&#206;&#183;&#207;&#130;: "Re: [hwloc-users] Problem with hwloc_set_thread_cpubind() and	pthread_barrier_wait() on new debianj"</a>
<li><strong>In reply to:</strong> <a href="0155.php">&#206;&#145;&#206;&#187;&#206;&#173;&#206;&#190;&#206;&#177;&#206;&#189;&#206;&#180;&#207;&#129;&#206;&#191;&#207;&#130; &#206;&#160;&#206;&#177;&#207;&#128;&#206;&#177;&#206;&#180;&#206;&#191;&#206;&#179;&#206;&#185;&#206;&#177;&#206;&#189;&#206;&#189;&#206;&#172;&#206;&#186;&#206;&#183;&#207;&#130;: "Re: [hwloc-users] Problem with hwloc_set_thread_cpubind() and	pthread_barrier_wait() on new debianj"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0157.php">Αλέξανδρος Παπαδογιαννάκης: "Re: [hwloc-users] Problem with hwloc_set_thread_cpubind()	and	pthread_barrier_wait() on new debianj"</a>
<li><strong>Reply:</strong> <a href="0157.php">Αλέξανδρος Παπαδογιαννάκης: "Re: [hwloc-users] Problem with hwloc_set_thread_cpubind()	and	pthread_barrier_wait() on new debianj"</a>
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
