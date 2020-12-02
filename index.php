<?php

    // use Elasticsearch\ClientBuilder;

    // require 'vendor/autoload.php';
    // $client = ClientBuilder::create()->build();
    
    // liek saving a data that can you retrieve usinsg get
    
    //$params = [
    //     'index' => 'my_index',
    //     'id'    => 'my_id',
    //     'body'  => ['testField' => 'abc']
    // ];
    
    // $response = $client->index($params);
    // print_r($response);

    // retrieve the data
    // $params = [
    //     'index' => 'my_index',
    //     'id'    => 'my_id',
      
       
    // ];
    
    // $response = $client->get($params);
    // print_r($response);


    // getting the body or content of a result
    // $params = [
    //     'index' => 'my_index',
    //     'id'    => 'my_id',
      
       
    // ];
    
    // $response = $client->getsource($params);
    // print_r($response);

    // $params = [
    //     'index' => '',
    //     'body'  => [
    //         'query' => [
    //             'match' => [
    //                 'Name' => 'John'
    //             ]
    //         ]
    //     ]
    // ];
    
    // $response = $client->search($params);
    // print_r($response);
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
    
        <form action="" method="post">
        <div class="form-group row">
            <div class="col-md-2">
            <label> Title</label>
            </div>
            <div class="col-md-10">
            <input class="form-control" type="text" name="title" id="">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
            <label> Body</label>
            </div>
            <div class="col-md-10">
            <input class="form-control" type="text" name="body" id="">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-2">
            <label> Keyword</label>
            </div>
            <div class="col-md-10">
            <input class="form-control" type="text" name="keywords" id="">
            </div>
        </div>

            <input type="submit" value="Submit" name="button" class="btn btn-success" style="width:100%;">
        </form>
   

    </div>
</body>

</head>
</html>

<?php 

    include 'init.php' ;
    

    //    $params = [
    //         'index' => 'articles',
    //         'type' => 'article',
    //         'id'    => 'Jgw1IXYBSRegw3d8gbD2 ',
          
           
    //     ];
        
    //     $response = $client->get($params);
    //     print_r($response);
  


    if(isset($_POST['button'])){
        $title  = $_POST['title'];
        $body = $_POST['body'];
        $keyword = explode(',', $_POST['keywords']);


        $query = $client->index([
            'index' => 'articles',
            'type' => 'article',
            'body' =>[
                'title' => $title,
                'body' => $body,
                'keywords' => $keyword
            ]

        ]);

        if($query){
            print_r($query);
        }
    }

?>