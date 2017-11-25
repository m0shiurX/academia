            <div class="ranking">
                <ul class="person">
                    <?php 
                        require_once "libs/account.php";
                        $accounts = new Account($dbh);
                        $accounts = $accounts->fetchAllAccounts();
                        if (isset($accounts) && sizeof($accounts) > 0){ 
                            foreach ($accounts as $account) { ?>
                            <li>
                                <!-- <div class="box"><img src="assets/prof.jpg" alt="" srcset=""></div> -->
                                <p><?=$account->fullname?></p>
                                <div class="circle"><span>50</span></div>
                            </li>
                    <?php }} ?>
                </ul>
            </div>