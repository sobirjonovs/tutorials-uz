<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/public/css/bootstrap.css">
  </head>
  <body>
  	<style>
  		.content {
  margin-top: 100px;
}
.bot{
  /* background-color: #f2f2f2; */
  background-clip: content-box;
}
.contentbox{
  background-clip: content-box;
}
.footer{
  position: relative;
  bottom: 0;
  top: 250px;
  min-height: 10px;
  max-height: 20px;
  height: 30px;
  padding: 10px;
  display: flex;
  align-items: center;
}
span#userIcon{
  position: relative;
  right: 5px;
  top: 30px;
  font-size: 50px;
}
.flex-container{
  display: flex;
  align-content: space-between;
  flex-wrap: wrap;
  justify-content: space-between;
  flex-direction: column;
  width: 385px;
  height: 50px;
}
.table-responsive{
  display: flex;
  align-content: flex-end;
}
@media (max-width: 600px) {
  .small-device{
    display: flex;
    flex-shrink: 
  }
  .welcomee{
    display: flex;
    justify-content: flex-end;
    margin-top: -40px;
  }
  .small{
    display: none;
  }
  .small-text{
    display: flex;
    align-items: center;
  }
  span#userIcon{
    position: absolute;
    font-size: 40px;
    top: 2px;
  }
  span.spantext{
    display: flex;
    align-items: center;
    font-size: 17px;
  }
}
  	</style>
     <?= $content ?>
  </body>
</html>