<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Classic UI</title>
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/stylesheets/classic-ui/classic-ui.css">
    </head>
    <body style="padding: 10px;">
      <h1>h1 你好 Classic UI 我是雅黑！</h1>
      <h3>h3 你好 Classic UI 我是雅黑！</h3>
      <h6>h6 你好 Classic UI 我是雅黑！</h6>

      <button class="btn-forest">我是一号按钮</button>
      <button class="btn-tree">我是二号按钮</button>
      <a class="btn-apple">我是三号按钮</a>

      <br>

      <span class="star">
          <span class="star-off"><span class="star-on" style="width: 70%;"></span></span>
          <span class="star-select">
                <span data-num="1"></span>
                <span data-num="2"></span>
                <span data-num="3"></span>
                <span data-num="4"></span>
                <span data-num="5"></span>
          </span>
      </span>

      <br>

      <ul class="breadcrumbs">
        <li class="menu">
          <a class="menu-title" href="#">理学、工学</a>
          <ul class="menu-content">
            <li class="sub-menu">
              <a class="sub-menu-title" href="#">软件学院</a>
              <ul class="sub-menu-content">
                <li>
                  <a href="#">计算机组织结构</a>
                </li>
                <li>
                  <a href="#">离散数学</a>
                </li>
                <li>
                  <a href="#">软件工程</a>
                </li>
                <li>
                  <a href="#">数据结构与算法</a>
                </li>
                <li>
                  <a href="#">人机交互的软件工程</a>
                </li>
              </ul>
            </li>
            <li class="sub-menu">
              <a class="sub-menu-title" href="#">计算机科学与技术系</a>
              <ul class="sub-menu-content">
                <li>
                  <a href="#">数理逻辑</a>
                </li>
                <li>
                  <a href="#">数字逻辑电路</a>
                </li>
                <li>
                  <a href="#">Linux系统分析</a>
                </li>
                <li>
                  <a href="#">数据结构与算法</a>
                </li>
                <li>
                  <a href="#">编译技术</a>
                </li>
                <li>
                  <a href="#">计算机组织结构</a>
                </li>
                <li>
                  <a href="#">离散数学</a>
                </li>
                <li>
                  <a href="#">软件工程</a>
                </li>
                <li>
                  <a href="#">我是名字超长的课课课课课课课课课课课课课课课</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="menu">
          <a class="menu-title" href="#">软件工程</a>
          <ul class="menu-content">
            <li>
              <a href="#">计算机组织结构</a>
            </li>
            <li>
              <a href="#">离散数学</a>
            </li>
            <li>
              <a href="#">软件工程</a>
            </li>
            <li>
              <a href="#">数据结构与算法</a>
            </li>
            <li>
              <a href="#">人机交互的软件工程</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">微积分II(第一层次)</a>
        </li>
      </ul>

      <br>

      <div class="slider" style="width: 640px;">
        <div class="clearfix">
          <ul class="slider-prompt">
          </ul>
        </div>
        <div class="slider-main">
          <div class="slider-prev off"></div>
          <div class="slider-next"></div>
          <div class="slider-content-wrapper">
            <ul class="slider-content">
              <?php for ($i=0; $i<=13; $i++) { ?>
              <li class="float-glass-trigger">
                <img src="http://img3.douban.com/mpic/s1525451.jpg" alt="" />
                <div class="float-glass<?php if ($i%4 > 1) { ?> float-glass-left<?php } ?>">

                </div>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>

      <br>

      <form id="form_id" action="" method="get">
        <div class="form-cloud">
          <label class="user">
            邮箱<br>
            <input type="email" name="email" required autofocus>
          </label>
          <span class="notice">你常用的邮箱，用来登陆、找回密码等</span>
        </div>
        <div class="form-cloud">
          <label class="user">
            名字<br>
            <input type="text" name="name" required pattern=".{1,10}" title="1到10个字符" maxlength="10">
          </label>
          <span class="notice">你在ClassIC的名字，中、英文字符均可</span>
        </div>
        <div class="form-cloud">
          <label class="pass">
            密码<br>
            <input type="password" name="pass" required pattern=".{8,20}" required title="8到20个字符" maxlength="20">
          </label>
          <span class="error">密码强度：弱</span>
        </div>

        <div class="form-sky">
          <label>
            <b>课程名</b>
            <input type="text">
          </label>
          <span class="error">密码强度：弱</span>
        </div>
        <div class="form-sky">
          <label>
            <b>课程简介</b>
            <textarea name="Name" rows="8" cols="40"></textarea>
          </label>
          <span class="notice">密码强度：弱</span>
        </div>
        <div class="form-sky">
          <label>
            <b>是否公开</b>
            <select>
              <option>是</option>
              <option>否</option>
            </select>
          </label>
          <span class="notice">密码强度：弱</span>
        </div>
        <div class="form-sky">
          <button type="submit" class="btn-simple">提交修改</button>
        </div>
      </form>

      <form class="form-yosimite" action="" method="get">
          <input type="text" placeholder="发现你的课程" name="keyword" required>
          <button type="submit" class="submit"></button>
          <a href="" class="advanced-search">高级搜索</a>
      </form>

      <form class="form-mavericks" action="" method="get">
          <div class="form-mavericks-wrapper">
            <input type="text" placeholder="发现你的课程" name="keyword" required>
            <button type="submit" class="submit"></button>
            <a href="" class="advanced-search">高级搜索</a>
          </div>
      </form>

      <hr>
      <pre>
        print "Hello World"
        # 这是code区域
      </pre>
      <ul>
        <li><a href="#">我是一个链接</a></li>
        <li><a href="#">我是又一个链接</a></li>
        <li><a href="#">我还是一个链接</a></li>
        <li><a href="#">我们都属于一个 ul</a></li>
      </ul>
      <h6>《论语》</h6>
      <p class="t2">
        <strong>宋代</strong>著名学者<u>朱熹</u>对此章评价极高，说它是 <mark>「入道之门，积德之基」</mark>。本章这三句话是人们非常熟悉的。历来的解释都是：学了以后，又时常温习和练习，不也高兴吗等等。三句话，一句一个意思，前后句子也没有什么连贯性。但也有人认为这样解释不符合原义，指出这里的「学」不是指学习，而是指学说或主张；「时」不能解为时常，而是时代或社会的意思，「习」不是温习，而是使用，引申为采用。而且，这三句话不是孤立的，而是前后相互连贯的。这三句的意思是：自己的学说，要是被社会采用了，那就太高兴了；退一步说，要是没有被社会所采用，可是很多朋友赞同我的学说，纷纷到我这里来讨论问题，我也感到快乐；再退一步说，即使社会不采用，人们也不理解我，我也不怨恨，这样做，不也就是君子吗？<small>（见《齐鲁学刊》1986年第6期文）</small> 这种解释可以自圆其说，而且也有一定的道理，供读者在理解本章内容时参考。
      </p>
      <p class="t2">
        此外，在对「人不知，而不愠」一句的解释中，也有人认为，「人不知」的后面没有宾语，人家不知道什么呢？当时因为孔子有说话的特定环境，他不需要说出知道什么，别人就可以理解了，却给后人留下一个谜。有人说，这一句是接上一句说的，从远方来的朋友向我求教，我告诉他，他还不懂，我却不怨恨。这样，「人不知」就是「人家不知道我所讲述的」了。这样的解释似乎有些牵强。
      </p>
      <blockquote>
        这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用，这是一段外部引用
      </blockquote>
      <p class="t2">
        此外，在对「人不知，而不愠」一句的解释中，也有人认为，「人不知」的后面没有宾语，人家不知道什么呢？当时因为孔子有说话的特定环境，他不需要说出知道什么，别人就可以理解了，却给后人留下一个谜。有人说，这一句是接上一句说的，从远方来的朋友向我求教，我告诉他，他还不懂，我却不怨恨。这样，「人不知」就是「人家不知道我所讲述的」了。这样的解释似乎有些牵强。
      </p>

      <script src="/javascripts/lib/jquery.1.9.1.js"></script>
      <script src="/javascripts/classic-ui.js"></script>
    </body>
</html>
