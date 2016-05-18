<?php $this->load->view('header');
//pr($_REQUEST);
?>
               <div class="padding">


            <div id="element-box" class="login">
                <div class="t">
                    <div class="t">
                        <div class="t"></div>
                    </div>
                </div>
                <div class="m">
                     <div class="err"><?=$error?></div>
                    <h1>Administration Login</h1>

                            <div id="section-box">
            <div class="t">
                <div class="t">
                    <div class="t"></div>
                 </div>
             </div>
            <div class="m">


<form action="<?=site_url()?>home" method="post" name="loginForm" id="loginForm" style="clear: both;">
    <p>
        <label for="username">Username</label>
        <input name="username" value="" id="username" type="text" class="inputbox" size="15" value=""/>
    </p>

    <p>
        <label for="password">Password</label>

        <input name="password" id="password" type="password" class="inputbox" size="15" value=""/>
    </p>
        <p>
        <label for="lang"></label>
        </p>
    <div style="padding-left: 180px;">
    <div class="button1-left">

        <div class="next">
            <a onclick="loginForm.submit();">
                Login            </a>
            <input type="submit" style="border: 0; padding: 0; margin: 0; width: 0px; height: 0px;" name="login" value="Login" />
        </div>
    </div>
    </div>
    <div class="clr"></div>

    <input type="hidden" name="option" value="com_login" />
    <input type="hidden" name="task" value="login" />
    <input type="hidden" name="19ae9ba1c1003ca0077aab8775e96bbd" value="1" />
</form>
                <div class="clr"></div>
            </div>
            <div class="b">
                <div class="b">
                     <div class="b"></div>

                </div>
            </div>
        </div>

                    <p>Use a valid username and password to gain access to the Administrator Back-end.</p>
                    <p>
                        <a href="../">Return to site Home Page</a>
                    </p>
                    <div id="lock"></div>

                    <div class="clr"></div>
                </div>
                <div class="b">
                    <div class="b">
                        <div class="b"></div>
                    </div>
                </div>



</td>
</tr>
</table>

<?php $this->load->view('footer');  ?>
