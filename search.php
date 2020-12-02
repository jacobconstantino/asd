
<?php 

include 'init.php' ;

if(isset($_GET['search'])){

    $value = $_GET['search'];

            // $params = [
            //     'index' => 'articles',
            //     'body'  => [
            //         'query' => [
            //             'bool' => [
            //                 'should' =>[
            //                     'match' =>  ['title' => $value],
            //                     'match' =>  ['body' => $value],
            //                     'match' =>  ['keywords' => $value],

            //                 ]
                        
            //             ]
            //         ]
            //     ]
            // ];

            $params = [
                'index' => 'articles',
                'body' => [
                    "query" => [
                        "multi_match" => [
                          "query"  =>   $value, 
                          "fields" => [ "title", "body","keywords" ] 
                        ]
                    ]
                ]
            ];

$response = $client->search($params);

echo '<pre>', print_r($response), '</pre>';


    if($response['hits']['total'] >=1){

        $results = $response['hits']['hits'];

    }
}

?>


<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<title> </title>
<style>
.content{
    margin:auto;
    width:500px;
    margin-top:40px;
}
</style>
<body>
    <div class="content">
    
        <form action="" method="get">
            <div class="form-group row">
                <div class="col-md-12">
                <input type="text"  class="form-control" name="search" id="">
                </div>

            </div>
   

            <input type="submit" name="button" class="btn btn-success" style="width:100%;">
            </div>
        </form>
   

    </div>
</body>

</head>
</html>


