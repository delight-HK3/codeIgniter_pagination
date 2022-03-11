<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <title>pagination</title>

        <!-- bootstrap 4.5 css -->
        <link rel="stylesheet" href="/my/css/bootstrap.css">

        <!-- font css -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="table-responsive">
                <table class="table" style="font-family: 'Noto Sans KR'; font-size:17px">
                    <thead>
                        <tr style="background-color: #ff6863; color:white">
                            <th style="text-align: center;">번호</th>
                            <th>제목</th>
                            <th>작성자</th>
                            <th style="text-align: center;">작성일</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                   
                            foreach($list as $row){
                        ?>
                                <tr>
                                    <td style="text-align: center;" scope="row"><?php echo($row->no);?></td>
                                    <td style="word-break: break-all;"><?php echo($row->name);?></td>
                                    <td><?php echo($row->writer);?></td>
                                    <td style="text-align: center;"><?php echo($row->writedate);?></td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div><br>
        <?php echo $pagination ?> 
        <!-- 페이지네이션 기능을 출력-->
    </body>
</html>

<!--bootstrap 4.5 Javascript-->
<script src="/my/js/jquery-3.6.0.js"></script>
<script src="/my/js/bootstrap.js"></script>

