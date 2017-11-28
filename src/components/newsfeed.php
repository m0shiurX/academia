            <div class="newsfeed">
                <ul class="news">
                    <?php
                        include("components/headx.php");
                        require_once "libs/newsfeed.php";
                        $newsfeed = new Newsfeed($dbh);
                        $nfeed = $newsfeed->fetchNews();

                        if (isset($nfeed) && sizeof($nfeed) > 0){
                        require_once "libs/article.php";
                        $articles = new Article($dbh);
                        require_once "libs/account.php";
                        $accounts = new Account($dbh);
                        $now = new DateTime();
                        foreach ($nfeed as $feed) {
                            $article = $articles->fetchArticleByID($feed->article_id);
                            $account = $accounts->fetchAccountByID($feed->account_id);
                            $date = new DateTime($feed->created_at);
                            $difference = $date->diff($now)->format("%d days, %h hours and %i minuts");
                            ?>
                            <li>
                                    <p><?=$account->fullname?> has added <i><a href="article.php?id=<?=$article->id?>"><?=$article->name?></i></a>.
                                        <br> 
                                    <span><?=$difference?> ago</span>
                                </p>
                                <div class="box"><img src="assets/prof.jpg" alt="" srcset=""></div>
                            </li>
                        <?php }
                        }
                    ?>
                </ul>
            </div>