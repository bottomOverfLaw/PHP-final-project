
<?php
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'common.php');
        require_once(Common::$PathDataDb."dbProdotto.php");
        require_once(Common::$PathDataDb."dbUtente.php");
        require_once(Common::$PathModels."prodotto.php");
        $dbU = new DbUtente();
        $dbP=new DbProdotto();
        $currentPage = isset($_GET['page']) ? ($_GET['page']) :1;
        $sort_field = isset($_GET['sort']) ? ($_GET['sort']) :'ProdottoID';
        $sort_order = isset($_GET['order']) ? ($_GET['order']) :'ASC';
        $catId = isset($_GET['id']) ?($_GET['id']) :0;
        //var_dump($sort_field);
        //var_dump($sort_order);
        $recordsPerPage = $dbP::$recordsPerPage;
        $offset=($currentPage-1)*$recordsPerPage;

        $search = isset($_GET['search']) ?($_GET['search']) :'';


        $pageUtility=$dbP->Count($search, $recordsPerPage);
        //var_dump($pageUtility);
        $totalRecord=$pageUtility["totalRecords"];
        $totalPages=$pageUtility["totalPages"];
        // ricerca prodotti
        
        echo '<form action="" method="get">';
        echo '<div class="input-group">';
        echo '<div class="form-outline">';
        echo '<input type="search" id="search" name="search" class="form-control" placeholder="ricerca prodotti" value="'.$search.'">';
        echo '</div>';
        echo '<select name="sort" id="sort">
        <option value="ProdottoId" '.($sort_field=='ProdottoID' ? 'selected' :"").'>ID</option>
        <option value="Prodotto" '.($sort_field=='Prodotto' ? 'selected' :"").'>Prodotto</option>
        <option value="Prezzo" '.($sort_field=='Prezzo' ? 'selected' :"").'>Prezzo</option>
        </select>
        <select name="order" id="order">
        <option value="ASC" '.($sort_order=='ASC' ? 'selected' :"").'>crescente</option>
        <option value="DESC" '.($sort_order=='DESC' ? 'selected' :"").'>decrescente</option>
        </select>';
        
        echo'</select>';
        echo '<button type="submit" class="btn btn-danger">';
        echo '<i class="fas fa-search"></i>';
        echo '</button>';
        echo '</div>';
        echo '</form>';

        $dbP->Display($search, $sort_field, $sort_order, $offset, $recordsPerPage);
 
        echo '<div class="btn-group" role="group" >';
        if($currentPage > 1){
            echo ' <button type="button" class="btn btn-outline-danger">
            <a href="?page='.($currentPage-1).'&search='.$search.'" class="link-dark d-inline link-underline-opacity-0"> <- </a>
            </button> ';
        }
        //echo '';
        $page=1;
        for($page=1;$page<=$totalPages; $page++){
            if($page==$currentPage){
                echo '<button type="button" class="btn btn-outline-danger text-secondary-emphasis">
                 <strong> '.$page.' </strong></button> ';
            } elseif($page == 1 || $page == $totalPages || ($page>= $currentPage-2)&&($page<= $currentPage+2)){
                echo ' <button type="button" class="btn btn-outline-danger text-secondary-emphasis">
                <a href="?page='.$page.'&search='.$search.'" class="link-dark d-inline link-underline-opacity-0"> '.$page.' </a>
                </button> ';
            } elseif(($page>= $currentPage-3)&&($page<= $currentPage+3)){
                echo '...';
            }
            
            // else {
            //     echo '<a href="?page='.$page.'">'.$page.'</a> ';
            // }
        }
        if($currentPage < $totalPages){
            echo ' <button type="button" class="btn btn-outline-danger text-secondary-emphasis">
            <a href="?page='.($currentPage+1).'&search='.$search.'" class="link-dark d-inline link-underline-opacity-0"> -> </a>
            </button> ';
        }
        echo '</div>';
    ?>
