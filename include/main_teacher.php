<?php 
session_start();


?>
<?php 
if ($_SESSION['t_class'] != 0) {
	?>
	<li>
		<a href="javascript: void(0);"><i class="fa fa-user"></i> <span> Quản lý học sinh </span> <span class="menu-arrow"></span></a>
		<ul class="nav-second-level" aria-expanded="false">
			<li><a href="javascript:getListStudent_CN()">Học Sinh Lớp Chủ Nhiệm</a></li>
		</ul>
	</li>
	<?php 
}
?>

<li>
	<a href="javascript: void(0);"><i class="fa fa-graduation-cap"></i><span> Quản lí điểm </span> <span class="menu-arrow"></span></a>
	<ul class="nav-second-level" aria-expanded="false">
		<?php 
		if ($_SESSION['t_class'] != 0) {
			echo '<li><a href="javascript:getListMark_Cn()">Điểm học sinh lớp chủ nhiệm</a></li>';
		}
		 ?>
		<li><a href="javascript:getListMark()">Điểm học sinh</a></li>

	</ul>
</li>
<li>
	<a href="javascript: void(0);"><i class="fa fa-bullhorn"></i><span> Thông báo </span> <span class="menu-arrow"></span></a>
	<ul class="nav-second-level" aria-expanded="false">
		<li><a href="javascript:getListNotice()">Thông báo cho học sinh</a></li>

	</ul>
</li>

</ul>

</div>
<!-- Sidebar -->
<div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
