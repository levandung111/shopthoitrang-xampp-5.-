<div class="wrapper">
    <div class="welcome"><a href="#" title=""><img src="images/userPic.png"
                                                   alt=""/></a><span>Xin chào, <?= $_SESSION['login_admin']['username'] ?>
            !</span></div>
    <div class="userNav">
        <ul>
            <li><a href="http://<?= $config_url ?>" title="" target="_blank"><img
                        src="./images/icons/topnav/mainWebsite.png" alt=""/><span>Vào trang web</span></a></li>
            <li><a href="index.php?com=user&act=admin_edit" title=""><img src="images/icons/topnav/profile.png" alt=""/><span>Thông tin tài khoản</span></a>
            </li>
            <li class="ddnew hidden-an"><a title=""><img src="images/icons/topnav/messages.png"
                                                         alt=""/><span>Thông báo</span><span class="numberTop">0</span></a>
                <ul class="userMessage">
                    <li><a href="admin.php?do=orders" title="" class="sInbox"><span>Đơn hàng</span> <span
                                class="numberTop" style="float:none; display:inline-block">0</span></a></li>
                    <li><a href="admin.php?do=comments" title="" class="sInbox"><span>Bình luận</span> <span
                                class="numberTop" style="float:none; display:inline-block">0</span></a></li>
                    <li><a href="admin.php?do=contact_logs" title="" class="sInbox"><span>Liên hệ</span> <span
                                class="numberTop" style="float:none; display:inline-block">0</span></a></li>
                </ul>
            </li>
            <li><a href="index.php?com=user&act=logout" id="userLogout" title=""><img
                        src="images/icons/topnav/logout.png" alt=""/><span>Đăng xuất</span></a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
  