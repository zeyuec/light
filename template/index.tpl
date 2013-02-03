<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf8">
    <title>observer</title>
    <link href="../static/css/index.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <div class="container">
      {foreach from=$postList item=post}
      <div class="post">
	{$post.content}
      </div>
      {/foreach}
    </div>
  </body>
</html>

    
