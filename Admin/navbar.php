
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">Yodruk Flower</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                              <a class="nav-link" href="index.php">หน้าหลัก <span class="sr-only">(current)</span></a>
                            </li>

    </ul>

  <form  name="admin" action="navbar_Search.php?page=<?php echo $_GET['page'];?>" method="POST" id="admin" class="form-inline my-2 my-lg-0">

      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item"><?php echo $_SESSION["a_name"];?> &nbsp;&nbsp;&nbsp;</li>
          <li class="nav-item"></li>
      </ul>
      <input class="form-control mr-sm-2" type="text" name='search' placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>