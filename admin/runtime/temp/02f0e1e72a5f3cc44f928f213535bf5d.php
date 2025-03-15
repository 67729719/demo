<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:39:"template/substation/dwxgroup/index.html";i:1716938982;s:71:"/www/wwwroot/ffjqplus.thuanai.cn/template/substation/common_header.html";i:1716938982;s:68:"/www/wwwroot/ffjqplus.thuanai.cn/template/substation/common_top.html";i:1716938982;s:71:"/www/wwwroot/ffjqplus.thuanai.cn/template/substation/common_footer.html";i:1716938982;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
  <title><?php echo session("su_title"); ?> <?php echo $subweb['oaname']; ?></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="/template/layuiadmin/layui/css/layui.css" media="all">
<link rel="stylesheet" href="/template/layuiadmin/style/admin.css" media="all">
<link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.15.1/css/all.css" rel="stylesheet">
<script src="https://cdn.bootcdn.net/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
</head>
<body>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-body">
			<div class="layui-form" lay-filter="component-form-element">
			    
 
         	
            <div class="layui-box layui-laypage layui-laypage-molv"><?php echo $page; ?></div>
            <table class="layui-table" lay-even="" lay-skin="nob">
            <thead>
              <tr>
                <th width="35">序号</th>
                <th>状态</th>
                <th>所属分销</th>
                <th>群名称/群模式</th>
                <th>曝光量</th>
                <th>订单数</th>
                <th>转化率</th>
                <th>总收款</th>
                <th>总赢利</th>
                <th>管理</th>
              </tr> 
            </thead>
            <tbody>
             <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr id="tr_<?php echo $vo['qwxg_id']; ?>">
					<td class="text-center"><?php echo $vo['qwxg_id']; ?></td>
                    <td>
                    <?php if($vo['qwxg_status']==1): ?><span class="layui-badge layui-bg-blue">启用</span>
                    <?php elseif($vo['qwxg_status']==2): ?><span class="layui-badge layui-bg-black">禁用</span><?php endif; ?>
                    </td>
                    <td><span class="layui-badge-rim"><?php echo $vo['du_name']; ?>（<?php echo $vo['du_smname']; ?></span></td>
                    <td><span class="layui-badge-rim"><?php echo $vo['qwxg_title']; ?> / <span class="layui-badge layui-bg-blue"><?php if($vo['qwxg_paytype']==1): ?>单群付费<?php else: ?>VIP（<?php echo $vo['qwxg_money']; ?>元）<?php endif; ?></span></span></td>
                    <td><?php echo $vo['qwxg_readcount']; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
							<div class="layui-btn-group">
								<button class="layui-btn layui-btn-sm" onClick="calldel('<?php echo url('wxgroup/del',array('id'=>$vo['qwxg_id'])); ?>','tr_<?php echo $vo['qwxg_id']; ?>')"><i class="layui-icon">&#xe640;</i></button>
								
							</div>
                    </td>
				</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table> 
          <div class="layui-box layui-laypage layui-laypage-molv"><?php echo $page; ?></div>
		  </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="/template/layuiadmin/layui/layui.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/template/showjs.js"></script>
<script>
  layui.config({
    base: '/template/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index','util','form', 'laydate','set','layer']);
</script> 
   <script>
	layui.use(['index','form'], function(){
		
		var form = layui.form;
		


    var $ = layui.$, active = {



	  indexsearch: function(){
		var scontent = $("#scontent").val();
		if(scontent==""){
		    var url = "<?php echo url('wxgroup/index'); ?>";
		}else{
		    var url = "<?php echo url('wxgroup/index',array('s'=>'AAAAA')); ?>";
		    url = url.replace("AAAAA", scontent);
		}
		window.location = url;
	  },

	 
	  add: function(){
		var id = $(this).data('id');
		var url = '<?php echo url('wxgroup/add'); ?>';
        layer.open({
          type: 2
          ,title: '添加群组'
          ,content: url
          ,area: ['550px', '290px']
        }); 
      },
	 
	  

    } 
	
	 
    $('.layui-btn').on('click', function(){
      var type = $(this).data('type');
      active[type] ? active[type].call(this) : '';
    });

	
  });
  </script>
</body>
</html>