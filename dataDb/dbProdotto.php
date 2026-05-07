<?php
    require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'common.php');
    //require_once(Common::$PathModels."catalogo.php");
    require_once(Common::$PathModels."prodotto.php");
    class DbProdotto extends DbRepository {
        public static int $recordsPerPage=10;

        public function AddP():bool{
            //TODO: implement
            //Admin only
        }
        public function RemoveP():bool{
            //TODO: implement
            //Admin only
        }
        public function UpdateP():bool{
            //TODO: implement
            //Admin only
        }

        public function SelectById(int $id){
            try {
                //$conn= parent::OpenConnection();

                $q=" SELECT * FROM prodotti WHERE prodottoid=$id";

                $row= parent::Select($q)[0]; //torna array

                $prodotto= new Prodotto();
                $prodotto->SetProdottoId($row["ProdottoID"]);
                $prodotto->SetProdotto($row["Prodotto"]);
                $prodotto->SetDescrizione($row["Descrizione"]);
                $prodotto->SetUnitaMisura($row["UnitaMisura"]);
                $prodotto->SetPrezzo($row["Prezzo"]);
                $prodotto->SetProduttoreId($row["ProduttoreId"]);
                $prodotto->SetCategoriaId($row["CategoriaId"]);
                $prodotto->SetNomeImmagine($row["NomeImmagine"].'.jpg');
                $prodotto->SetAttivo($row["Attivo"]);

                //return $prodotto;


            } catch (Exception $e) {
                throw $e;
            }  finally {
                return $prodotto;
            }
        }

        public function Count(string $search, int $recordsPerPage):?array{
            try {
                $ar =array();

                $conn= parent::OpenConnection();

                if($search=="") {
                    $query = 'SELECT count(*) FROM prodotti';
                    $st=$conn->prepare($query);

                } else {
                    $query = 'SELECT count(*) FROM prodotti WHERE prodotto like :search';
                    $st=$conn->prepare($query);
                    $st->bindValue(':search','%'.$search.'%');
                }
                //var_dump($query);

                $st->execute();
                $totalRecord = $st->fetchColumn();
                $totalPages = ceil($totalRecord/$recordsPerPage);

                $ar["totalRecords"]=$totalRecord;
                $ar["totalPages"]=$totalPages;

            } catch (Exception $e) {
                throw "Qualcosa è andato storto".$e;
                $ar =array();
            } finally {
                parent::CloseConnection();
                //var_dump($ar);
                return $ar;
            }
        }

        public function Display(string $search, string $sort_field, string $sort_order, string $offset, string $recordsPerPage):void{
            try {
                $conn= parent::OpenConnection();

                $query = 'SELECT * FROM prodotti WHERE prodotto like :search';
                $query .= " ORDER BY $sort_field $sort_order LIMIT :limit offset :offset ;";

                $st=$conn->prepare($query);
                $st->bindParam(':offset',$offset,PDO::PARAM_INT);
                $st->bindParam(':limit',$recordsPerPage,PDO::PARAM_INT);
                $st->bindValue(':search','%'.$search.'%');
                $st->execute();
                
                echo '
                <div class="container py-5">
                  <div class="row">';
                while($row = $st->fetch(PDO::FETCH_ASSOC)){
                    $link = "/final_project/views/prodotto.php?id=" . $row["ProdottoID"];
                    //echo '<td>'.$id++.'</td>';
                    //echo '<div class="card-body">'.$row['ProdottoID'].'</td>';
                    echo '<div class="card col-4">
                    <div class="card-body">';
                    echo '<img src="/final_project/Images/'.$row['NomeImmagine'].'.jpg" class="card-img-top" width="200" height="200">';
                    echo' <div class="d-flex justify-content-between">';
                    echo '<h5 class="card-title mb-3">'.$row['Prodotto'].'</h5>
                    </div>';
                    echo '<h6 class="mb-3">'.$row['Prezzo'].'€</h6>';
                    echo '<button type="button" class="btn btn-outline-danger btn-lg"><a href="'.$link.'" class="link-dark d-inline link-underline-opacity-0">Maggiori informazioni</a></button> 
                    </div>
                    </div>';
                }
                echo '  </div>
                </div>';

            } catch (Exception $e) {
                throw "Qualcosa è andato storto".$e;
            } finally {
                parent::CloseConnection();
            }
            
        }

    }

    //$link="?id".$row["ProdottoId"];