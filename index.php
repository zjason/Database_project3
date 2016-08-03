<HTML>
<HEAD>
<TITLE>DBLP web application</TITLE>
<link rel="stylesheet" type="text/css" href="css/style.css">
</HEAD>
<Body>
<?php
  session_start();
  if(isset($_GET['logout'])){
    unset($_SESSION['email']);
  }

  if(isset($_SESSION['email'])){
    $user = $_SESSION['email'];
    echo "<H1 id='project_name'>&lt;DBLP Project&gt;</H1>
          <p class='userinfo'>welcom back, <a href='userinfo.php'>$user</a>! <a href='?logout'>Logout</a><p>";
  }else{
    echo "<div id='top_message'>
          <p >you haven't log in, do you want to <a href='signup.html' id='login_message'>log in</a> first?</p>
          </div>
          <H1 id='project_name'>&lt;DBLP Project&gt;</H1>
          <p class='userinfo'><a href='signup.html'>Login</a></p>";
  }
?>

<B></B> 
<B>Team Members:</B><BR><BR>
<li> Tommy Dean <BR>
<li> Mingrui Zhao <BR>
<BR>
<hr>

<ul>
<li><B>Relations:</B><BR><BR>

<ol>
<li><a href="Publication.php">Publication</a>
<li><a href="Reference.php">Reference</a>
<li><a href="WWW.php">WWW</a>
<li><a href="Authors.php">Authors</a>
<li><a href="Editor.php">Editor</a>
</ol>
<BR><BR>
<hr>

<li><B>Queries:</B><BR><BR>

<ol>
<li><a href="q1.php">Query1</a>: It lists the 10 latest publications by author "Philip S. Yu'
<li><a href="q2.php">Query2</a>: It shows the number of publications that first appeared in a conference and later appeared with the same title in a journal
<li><a href="q3.php">Query3</a>: It shows the 10 scientists with the highest number of collaborators restricted to type "articles"
<li><a href="q4.php">Query4</a>: It shows the 20 website with both dblp_ley and url, user can click url to view the source
</ol>
<BR><BR>
<hr>
<li><B>Ad-hoc Query:</b><BR><BR>
<i>Here, provide a free-form box and two buttons called
"Submit" and "Clear". The intent is that the user can enter any arbitrary
SQL query in the box and click the submit button; The action should be that you should
execute that query on the database and bring up the answers on a separate
page, once again, in a neat orderly fashion. Notice that the input
can be any legal SQL query (permissible under your DB system, of course).
</i><BR><BR>
<FORM METHOD=POST ACTION="queryresult.php">
      <table>
        <tr>
          <td align = right>
            <strong>Please enter your query here<br></font></strong>
          </td>
          <td>
            <input type=text size=50 maxlength=100 name="query">
          </td>
        </tr>
        <tr>
          <td align = right>
            <input type=reset value="Clear">
          </td>
          <td>
            <input type=submit value="Submit">
          </td>
        </tr>
      </table>
    </FORM>
<BR><BR>
<hr>
<li><strong>Recommend User to follow:</strong><br><br>
  
</ul>
<BR><BR>
</p>
</font>
<HR NOSHADE SIZE=2>
</P>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/index_page.js"></script>
</BODY></HTML>