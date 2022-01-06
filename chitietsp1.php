<?php
include('./MVC/core/connectDB.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
}else{
    $id='';
}
$sql="SELECT id,hinh,tenhh,gia,mshh FROM hanghoa1 where id='$id'";
$query=mysqli_query($con,$sql);
//print_r($query);
//  while($row = mysqli_fetch_array($query)) {
//      print_r($row);
//  }

?>
<div class="chitietsanpham">
					<div class="chitiettrai">
                    <?php while($row = mysqli_fetch_array($query)){?>                     
						<div class="chitiethinh">
							<img src="<?php echo( $row['hinh'] )?>" alt="" width=380px height=500px >
						</div>
						<div class="motasanpham">
							<ul>Thông Tin Sản Phẩm: <br>
                            <li>Thấm hút mồ hôi tốt, thoáng mát khi mặc</li>
                            <li>Phù hợp in decal, in nhiệt; dễ đặt đội, nhóm</li>
                            <li>Độ co giãn của vải tốt, ít bị nhăn nhàu khi mặc và khi giặt.</li>
                            <li>Sợi vải mềm, thoáng mát, thấm hút mồ hôi tốt, co giãn 4 chiều, độ bền cao</li>
                        </ul>
						</div>
					</div>
					<div class="chitietphai">
						<div class="txt_titleName"><?php echo $row['tenhh'] ?></div>
						<div class="gia"><?php echo number_format( $row['gia']). 'vnđ' ?> </span> </a></div>
						<div class="SL">    
                        <form action="?quanly=giohang" method="post">      
                        <input type="hidden" name="tensanpham" value="<?php echo $row['tenhh'] ?>">
                        <input type="hidden" name="mshh" value="<?php echo $row['mshh'] ?>">
                        <input type="hidden" name="sanpham_id" value="<?php echo $row['id'] ?>">
                        <input type="hidden" name="giasanpham" value="<?php echo $row['gia'] ?>">
                        <input type="hidden" name="hinhanh" value="<?php echo $row['hinh'] ?>">
                        <input type="hidden" name="soluong" value="1">
                        <input type="hidden" name="url" value="<?php echo $_SERVER['QUERY_STRING'] ?>">
                        <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" id="tgh">
                        </form>    
                    </div>
					<div class="kmmh">
                    <ul > Khuyến Mãi Mua Hàng : <br>
                        <li>Đặt từ 3 - 5 FreeShip Toàn Quốc.</li>
                        <li>Đặt từ 7 - 9 bộ tặng 1 Túi đựng giày 2 ngăn 79k.</li>
                        <li>Đặt từ 10 bộ tặng 1 Quần áo thủ môn 119k.</li>
                        <li>Đặt từ 16 bộ tặng 1 Quần áo thủ môn 149k.</li>
                    </ul>
                    </div>
                    <div class="LH"><i class="fa fa-phone" aria-hidden="true"></i> Liên hệ đặt sản phẩm trực tiếp theo số HotLine:<span style="color: red;">083.4445508</span></div>
                        <?php }?>
					</div>
				</div>
				<div class="hdmh"><u><b> HƯỚNG DẪN MUA HÀNG:</b></u><br>

                <br><u><b>Cách 1:>Mua hàng trực tiếp tại các địa chỉ gần nhất thuộc hệ thống của cửa hàng.</b></u><br>
                 
                <br> <i>Click chuột vào đây để tìm địa chỉ cửa hàng gần vị trí của bạn nhất:  https:KickEASport.com</i>
                 
                <br> <br><u><b>Cách 2: Mua hàng online:</b></u>
                 
                <br> <br> <i>- Sau khi xem sản phẩm trên website: https:KickEASport.com và chọn được cho mình sản phẩm ưng ý, Quý khách có thể gọi cho chúng tôi theo số Hotline: 0834 44 5508 để đặt mua hàng và in ấn theo yêu cầu. 
                 
                <br> <br> - Quý khách cũng có thể chọn sản phẩm yêu thích trên website rồi ấn vào nút ‘MUA NGAY” để điền thông tin đơn hàng cần đặt mua theo các bước hướng dẫn. 
                 
                <br> <br> - Quý khách cũng có thể để lại lời nhắn đặt hàng qua email: KickEASport@gmail.com 
                -Sau khi in ấn xong toàn bộ sản phẩm, chúng tôi sẽ giao hàng đúng hẹn và đúng địa điểm mà Quý Khách yêu cầu. Phí shipping đối với đơn hàng có giá trị lớn được miễn phí, đơn hàng nhỏ sẽ tính theo giá hiện hành của các công ty giao hàng nhanh. 
                 
                <br> <br>  -Website KickEASport.com của chúng tôi đã được  Bộ Công Thương cấp phép hoạt động thương mại điện tử (Ở dưới chân trang web có con dấu cấp phép) vì vậy quý khách hoàn toàn có thể yên tâm về việc chuyển khoản và nhận hàng đúng như cam kết.
            </i>
                 
                <br><br> Mọi thắc mắc, xin vui lòng gọi cho chúng tôi theo số: Hotline 083.444.5508
                <br><br> Trân trọng.</div>