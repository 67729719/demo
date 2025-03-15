<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:42:"template/website/center/shujukeshihua.html";i:1716938982;s:68:"/www/wwwroot/ffjqplus.thuanai.cn/template/website/common_header.html";i:1716938982;s:65:"/www/wwwroot/ffjqplus.thuanai.cn/template/website/common_top.html";i:1716938982;s:68:"/www/wwwroot/ffjqplus.thuanai.cn/template/website/common_footer.html";i:1716938982;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
      <meta charset="utf-8">
  <title><?php echo $subweb['oaname']; ?></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/template/layuiadmin/layui/css/layui.css" media="all">
<link rel="stylesheet" href="/template/layuiadmin/style/admin.css" media="all">
<link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.15.1/css/all.css" rel="stylesheet">
<script src="https://cdn.bootcdn.net/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
    <style>
    .action{border:1px solid #090; color:#090; font-weight:bolder;}
    </style>
    <title>数据可视化大屏</title>
    <script type="text/javascript" src="/template/static/shujukeshihua/js/jquery.js"></script>
    <link rel="stylesheet" href="/template/static/shujukeshihua/css/comon0.css">
</head>
<script type="text/javascript">
	$(document).ready(function(){
		var html=$(".wrap ul").html()
		$(".wrap ul").append(html)
		var ls=$(".wrap li").length/2+1
		i=0
		ref = setInterval(function(){
			i++
			if(i==ls){
				i=1
				$(".wrap ul").css({marginTop:0})
				$(".wrap ul").animate({marginTop:-'.52'*i+'rem'},1000)
			}
	    	$(".wrap ul").animate({marginTop:-'.52'*i+'rem'},1000)


		},2400);



				var html2=$(".adduser ul").html()
		$(".adduser ul").append(html2)
		var ls2=$(".adduser li").length/2+1
		a=0
		ref = setInterval(function(){
			a++
			if(a==ls2){
				a=1
				$(".adduser ul").css({marginTop:0})
				$(".adduser ul").animate({marginTop:-'.5'*a+'rem'},800)
			}
	    	$(".adduser ul").animate({marginTop:-'.5'*a+'rem'},800)
		},4300);
	})
</script>
<body>
    <div class="loading">
        <div class="loadbox"> <img src="/template/static/shujukeshihua/images/loading.gif"> 页面加载中... </div>
    </div>
    <div class="head">
        <h1><?php echo $subweb['oaname']; ?>企业级总站可视化大屏</h1>
        <div class="weather"><span id=localtime></span></div>
    </div>
    <div class="back"></div>
    <div class="layui-fluid">
  <div class="layui-row layui-col-space15">

	
    <div class="layui-col-md3">
        <!-- 1 -->
        <div class="boxall">
            <div class="alltitle">日排行</div>
            <div class="layui-card-body">
                <table class="layui-table" lay-even="" lay-skin="nob">
                    <thead>
                        <tr>
                            <th>分站名称</th>
                            <th>今日收款</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php if(is_array($bill_day) || $bill_day instanceof \think\Collection || $bill_day instanceof \think\Paginator): $i = 0; $__LIST__ = $bill_day;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><?php echo $vo['su_title']; ?></td>
                            <td><?php echo round($vo['zj'],2); ?></td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table> 
            </div>
        </div>
        <!-- 1 -->
    </div>


    <div class="layui-col-md3">
        <!-- 1 -->
        <div class="boxall">
            <div class="alltitle">近7天排行</div>
            <div class="layui-card-body">
                <table class="layui-table" lay-even="" lay-skin="nob">
                    <thead>
                        <tr>
                            <th>分站名称</th>
                            <th>周收款</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php if(is_array($bill_week) || $bill_week instanceof \think\Collection || $bill_week instanceof \think\Paginator): $i = 0; $__LIST__ = $bill_week;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><?php echo $vo['su_title']; ?></td>
                            <td><?php echo round($vo['zj'],2); ?></td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table> 
            </div>
        </div>
        <!-- 1 -->
    </div>
    
    
    
    <div class="layui-col-md3">
        <!-- 1 -->
        <div class="boxall">
            <div class="alltitle">本月排行</div>
            <div class="layui-card-body">
                <table class="layui-table" lay-even="" lay-skin="nob">
                    <thead>
                        <tr>
                            <th>分站名称</th>
                            <th>月收款</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php if(is_array($bill_moon) || $bill_moon instanceof \think\Collection || $bill_moon instanceof \think\Paginator): $i = 0; $__LIST__ = $bill_moon;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><?php echo $vo['su_title']; ?></td>
                            <td><?php echo round($vo['zj'],2); ?></td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table> 
            </div>
        </div>
        <!-- 1 -->
    </div>
    
    
    
    <div class="layui-col-md3">
        <!-- 1 -->
        <div class="boxall">
            <div class="alltitle">总排行</div>
            <div class="layui-card-body">
                <table class="layui-table" lay-even="" lay-skin="nob">
                    <thead>
                        <tr>
                            <th>分站名称</th>
                            <th>总收款</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php if(is_array($bill_z) || $bill_z instanceof \think\Collection || $bill_z instanceof \think\Paginator): $i = 0; $__LIST__ = $bill_z;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><?php echo $vo['su_title']; ?></td>
                            <td><?php echo round($vo['zj'],2); ?></td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
  </div>
  </div>
    <div class="mainbox">
        <ul class="clearfix">
            <li>
                <div class="boxall" style="height: 2.7rem">
                    <div class="alltitle">销售数据统计</div>

                    <div class="sycm">
                        <ul class="clearfix">
                            <li><h2><?php echo round($d_money_count,2); ?></h2><span>当天销售额</span></li>
                            <li><h2><?php echo $d_bill_count; ?></h2><span>当天订单量</span></li>
                            <li><h2><?php echo $d_user_count; ?></h2><span>当天新用户数</span></li>
                        </ul>
                        <div style="border-bottom: 1px solid rgba(255,255,255,.1)"></div>
                        <ul class="clearfix">
                            <li><h2><?php echo round($z_money_count,2); ?></h2><span>总销售额</span></li>
                            <li><h2><?php echo $z_bill_count; ?></h2><span>总订单量</span></li>
                            <li><h2><?php echo $z_user_count; ?></h2><span>总用户数</span></li>
                        </ul>


                    </div>
                    <div class="boxfoot"></div>
                </div>
                <div class="boxall" style="height: 2.65rem">
                    <div class="alltitle">消费占比</div>
                    <div class="sy" id="echarts1"></div>
                    <div class="sy" id="echarts2"></div>
                    <div class="sy" id="echarts3"></div>
                    <div class="boxfoot"></div>
                </div>
                <div class="boxall" style="height: 2.95rem">
                    <div class="alltitle">变现灵感分享</div>
                    <div id="echarts4" style="width: 100%;"></div>
                    <div class="addnew">
                        <div class="tit02"><span>选择自己合适的赛道</span></div>
                        <div class="adduser">
                            <ul class="clearfix">
                                <li class="clearfix"> <span class="pulll_left"><img src="/template/static/shujukeshihua/images/head.jpg">1：交友扩列聊天群</span> <span class="pulll_right">利用交友进群方式变现</span> </li>
                                <li class="clearfix"> <span class="pulll_left"><img src="/template/static/shujukeshihua/images/head.jpg">2：视频图片等资源群</span> <span class="pulll_right">进群获取资源的方式变现</span> </li>
                                <li class="clearfix"> <span class="pulll_left"><img src="/template/static/shujukeshihua/images/head.jpg">3：主播粉丝集合群</span> <span class="pulll_right">美女主播聊天群，主要色粉</span> </li>
                                <li class="clearfix"> <span class="pulll_left"><img src="/template/static/shujukeshihua/images/head.jpg">4：创业项目分享群</span> <span class="pulll_right">发布项目变现等赚钱资源</span> </li>
                                <li class="clearfix"> <span class="pulll_left"><img src="/template/static/shujukeshihua/images/head.jpg">5：破解软件分享群</span> <span class="pulll_right">发布破解软件等黑科技app</span> </li>
                                <li class="clearfix"> <span class="pulll_left"><img src="/template/static/shujukeshihua/images/head.jpg">6：表情包分享群</span> <span class="pulll_right">发布表情包图片等资源</span> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="boxfoot"></div>
                </div>
            </li>
            <li>
                <div class="bar">
                    <div class="barbox">
                        <ul class="clearfix">
                            <li class="pulll_left counter"><?php echo round($z_money_count,2); ?></li>
                            <li class="pulll_left counter"><?php echo $z_bill_count; ?></li>
                        </ul>
                    </div>
                    <div class="barbox2">
                        <ul class="clearfix">
                            <li class="pulll_left">总销售额</li>
                            <li class="pulll_left">总订单量</li>
                        </ul>
                    </div>
                </div>
                <div class="map">
                    <div class="map1"><img src="/template/static/shujukeshihua/images/lbx.png"></div>
                    <div class="map2"><img src="/template/static/shujukeshihua/images/jt.png"></div>
                    <div class="map3"><img src="/template/static/shujukeshihua/images/map.png"></div>
                    <div class="map4" id="map_1"></div>
                </div>
            </li>
            <li>
                <div class="boxall" style="height:5.2rem">
                    <div class="alltitle">新增会员信息</div>
                    <div class="tabs">
                        <ul class="clearfix">
                            <li><a class="active" href="#">7天</a></li>
                            <li><a href="#">15天</a></li>
                            <li><a href="#">30天</a></li>
                        </ul>
                    </div>
                    <div class="clearfix">
                        <div class="sy" id="echarts6"></div>
                        <div class="sy" id="echarts7"></div>
                        <div class="sy" id="echarts8"></div>
                    </div>
                    <div class="addnew">
                        <div class="tit02"><span>今日新增会员列表</span></div>
                        <div class="adduser">
                            <ul class="clearfix">
                                <li class="clearfix"> <span class="pulll_left"><img src="/template/static/shujukeshihua/images/head.jpg">1：今日新增会员列表</span> <span class="pulll_right">21岁 - 男 - 西安 </span> </li>
                                <li class="clearfix"> <span class="pulll_left"><img src="/template/static/shujukeshihua/images/head.jpg">2：今日新增会员列表</span> <span class="pulll_right">22岁 - 女 - 成都 </span> </li>
                                <li class="clearfix"> <span class="pulll_left"><img src="/template/static/shujukeshihua/images/head.jpg">3：今日新增会员列表</span> <span class="pulll_right">23岁 - 男 - 广州 </span> </li>
                                <li class="clearfix"> <span class="pulll_left"><img src="/template/static/shujukeshihua/images/head.jpg">4：今日新增会员列表</span> <span class="pulll_right">24岁 - 女 - 北京 </span> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="boxfoot"></div>
                </div>
                <div class="boxall" style="height: 3.4rem">
                    <div class="tit02"><span>折线统计图</span></div>
                            <div class="layui-card">
                                    <div id="container" style="height: 215px">
                                    </div>
                            </div>
                    <div class="boxfoot"></div>
                </div>
            </li>
        </ul>
 
    </div>
    <script> function showLocale(objD) { var str = ''; var yy = objD.getFullYear(); var MM = objD.getMonth() + 1; var dd = objD.getDate(); var hh = objD.getHours(); var mm = objD.getMinutes(); var ss = objD.getSeconds(); var ww = objD.getDay(); if (ww < 0 || ww > 6) { ww = '星期'[Math.floor(ww / 7)]; } else { ww = ['日', '一', '二', '三', '四', '五', '六'][ww]; } str += yy + '-' + MM + '-' + dd + ' ' + hh + ':' + mm + ':' + ss + ' ' + ww; return str; } var today = new Date(); document.getElementById('localtime').innerHTML = showLocale(today); setInterval(function() { today = new Date(); document.getElementById('localtime').innerHTML = showLocale(today); }, 1000); </script>
    <script language="JavaScript" src="/template/substation/data/js/js.js"></script>
    <script type="text/javascript" src="/template/substation/data/js/echarts.min.js"></script>
    <script type="text/javascript" src="/template/substation/data/js/china.js"></script>
    <script type="text/javascript" src="/template/substation/data/js/area_echarts.js"></script>
    <span id="localtime"></span> <script> function showLocale(objD) { var str = ''; var yy = objD.getFullYear(); var MM = objD.getMonth() + 1; var dd = objD.getDate(); var hh = objD.getHours(); var mm = objD.getMinutes(); var ss = objD.getSeconds(); var ww = objD.getDay(); if (ww < 0 || ww > 6) { ww = '星期'[Math.floor(ww / 7)]; } else { ww = ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'][ww]; } str += yy + '-' + MM + '-' + dd + ' ' + hh + ':' + mm + ':' + ss + ' ' + ww; return str; } var today = new Date(); document.getElementById('localtime').innerHTML = showLocale(today); setInterval(function() { today = new Date(); document.getElementById('localtime').innerHTML = showLocale(today); }, 1000); </script>
    <script language="JavaScript" src="/template/static/shujukeshihua/js/js.js"></script>
    <script type="text/javascript" src="/template/static/shujukeshihua/js/echarts.min.js"></script>
    <script type="text/javascript" src="/template/static/shujukeshihua/js/china.js"></script>
    <script type="text/javascript" src="/template/static/shujukeshihua/js/area_echarts.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            myChart1.resize();
            myChart2.resize();
            myChart3.resize();
            myChart6.resize();
            myChart7.resize();
            myChart8.resize();
        })
        window.addEventListener("resize", function () {
            myChart1.resize();
            myChart2.resize();
            myChart3.resize();
            myChart6.resize();
            myChart7.resize();
            myChart8.resize();
        });
    </script>
    <script type="text/javascript">
        var v0 = 1000;
        var v1 = 353;
        var v2 = 178;
        var v3 = 68;



        var myChart6 = echarts.init(document.getElementById('echarts6'));
        option6 = {
            series: [{
                type: 'pie',
                radius: ['70%', '80%'],
                color: '#0088cc',
                label: {
                    normal: {
                        position: 'center'
                    }
                },
                data: [{
                    value: v1,
                    name: '新增会员',
                    label: {
                        normal: {
                            formatter: v1 + '',
                            textStyle: {
                                fontSize: 20,
                                color: '#fff',
                            }
                        }
                    }
                },
                       {
                           value: v0,
                           name: '老会员',
                           label: {
                               normal: {
                                   formatter: function (params) {
                                       return '占比' + Math.round(v1 / v0 * 100) + '%'
                                   },
                                   textStyle: {
                                       color: '#aaa',
                                       fontSize: 12
                                   }
                               }
                           },
                           itemStyle: {
                               normal: {
                                   color: 'rgba(255,255,255,.2)'
                               },
                               emphasis: {
                                   color: '#fff'
                               }
                           },
                       }]
            }]

        };

        var myChart7 = echarts.init(document.getElementById('echarts7'));
        option7 = {
            series: [{
                type: 'pie',
                radius: ['70%', '80%'],
                color: '#fccb00',
                label: {
                    normal: {
                        position: 'center'
                    }
                },
                data: [{
                    value: v2,
                    name: '新增领卡会员',
                    label: {
                        normal: {
                            formatter: v2 + '',
                            textStyle: {
                                fontSize: 20,
                                color: '#fff',
                            }
                        }
                    }
                },
                       {
                           value: v0,
                           name: '总领卡会员',
                           label: {
                               normal: {
                                   formatter: function (params) {
                                       return '占比' + Math.round(v2 / v0 * 100) + '%'
                                   },
                                   textStyle: {
                                       color: '#aaa',
                                       fontSize: 12
                                   }
                               }
                           },
                           itemStyle: {
                               normal: {
                                   color: 'rgba(255,255,255,.2)'
                               },
                               emphasis: {
                                   color: '#fff'
                               }
                           },
                       }]
            }]
        };


        var myChart8 = echarts.init(document.getElementById('echarts8'));
        option8 = {


            series: [{

                type: 'pie',
                radius: ['70%', '80%'],
                color: '#62b62f',
                label: {
                    normal: {
                        position: 'center'
                    }
                },
                data: [{
                    value: v3,
                    name: '女性客户',
                    label: {
                        normal: {
                            formatter: v3 + '',
                            textStyle: {
                                fontSize: 20,
                                color: '#fff',
                            }
                        }
                    }
                }, {
                    value: v0,
                    name: '男性客户',
                    label: {
                        normal: {
                            formatter: function (params) {
                                return '占比' + Math.round(v2 / v0 * 100) + '%'
                            },
                            textStyle: {
                                color: '#aaa',
                                fontSize: 12
                            }
                        }
                    },
                    itemStyle: {
                        normal: {
                            color: 'rgba(255,255,255,.2)'
                        },
                        emphasis: {
                            color: '#fff'
                        }
                    },
                }]
            }]
        };
        setTimeout(function () {
            myChart6.setOption(option6);
            myChart7.setOption(option7);
            myChart8.setOption(option8);
        }, 500);

    </script>
    <script type="text/javascript">
        var myChart1 = echarts.init(document.getElementById('echarts1'));
        var v1 = 298;
        var v2 = 523;
        var v3 = v1 + v2;
        option1 = {

      
            series: [{
                type: 'pie',
                radius: ['70%', '80%'],
                color: '#0088cc',
                label: {
                    normal: {
                        position: 'center'
                    }
                },
                data: [{
                    value: v1,
                    name: '平均单客价',
                    label: {
                        normal: {
                            formatter: v3 + '',
                            textStyle: {
                                fontSize: 20,
                                color: '#fff',
                            }
                        }
                    }
                },
                ]
            }]
        };


        var myChart3 = echarts.init(document.getElementById('echarts3'));
        var v1 = 298 
        var v2 = 523 
        var v3 = v1 + v2 
        option2 = {

       
            series: [{
                type: 'pie',
                radius: ['70%', '80%'],
                color: '#fccb00',
                label: {
                    normal: {
                        position: 'center'
                    }
                },
                data: [{
                    value: v1,
                    name: '男性客户',
                    label: {
                        normal: {
                            formatter: v1 + '',
                            textStyle: {
                                fontSize: 20,
                                color: '#fff',
                            }
                        }
                    }
                }, {
                    value: v2,
                    name: '女性客户',
                    label: {
                        normal: {
                            formatter: function (params) {
                                return '占比' + Math.round(v1 / v3 * 100) + '%'
                            },
                            textStyle: {
                                color: '#aaa',
                                fontSize: 12
                            }
                        }
                    },
                    itemStyle: {
                        normal: {
                            color: 'rgba(255,255,255,.2)'
                        },
                        emphasis: {
                            color: '#fff'
                        }
                    },
                }]
            }]
        };


        var myChart2 = echarts.init(document.getElementById('echarts2'));
        option3 = {


            series: [{

                type: 'pie',
                radius: ['70%', '80%'],
                color: '#62b62f',
                label: {
                    normal: {
                        position: 'center'
                    }
                },
                data: [{
                    value: v2,
                    name: '女性客户',
                    label: {
                        normal: {
                            formatter: v2 + '',
                            textStyle: {
                                fontSize: 20,
                                color: '#fff',
                            }
                        }
                    }
                }, {
                    value: v1,
                    name: '男性客户',
                    label: {
                        normal: {
                            formatter: function (params) {
                                return '占比' + Math.round(v2 / v3 * 100) + '%'
                            },
                            textStyle: {
                                color: '#aaa',
                                fontSize: 12
                            }
                        }
                    },
                    itemStyle: {
                        normal: {
                            color: 'rgba(255,255,255,.2)'
                        },
                        emphasis: {
                            color: '#fff'
                        }
                    },
                }]
            }]
        };
        setTimeout(function () {
            myChart1.setOption(option1);
            myChart2.setOption(option2);
            myChart3.setOption(option3);
        }, 500);

    </script>
    <script type="text/javascript">
        var myChart = echarts.init(document.getElementById('echarts4'));
        var plantCap = [{
            name: '工业',
            value: '222'
        }, {
            name: '农业',
            value: '115'
        }, {
            name: '互联网',
            value: '113'
        }, {
            name: '医疗',
            value: '95'
        }, {
            name: '文学',
            value: '92'
        }, {
            name: '服装',
            value: '87'
        }];
        var datalist = [{
            offset: [56, 48],
            symbolSize: 110,
   
            color: 'rgba(73,188,247,.14)',

        }, {

            offset: [30, 70],
            symbolSize: 70,
            color: 'rgba(73,188,247,.14)'
        }, {
            offset: [0, 43],
            symbolSize: 60,
            color: 'rgba(73,188,247,.14)'

        }, {
            offset: [93, 30],
            symbolSize: 70,
            color: 'rgba(73,188,247,.14)'
        }, {
            offset: [26, 19],
            symbolSize: 65,
            color: 'rgba(73,188,247,.14)'
        }, {
            offset: [75, 75],
            symbolSize: 60,
            color: 'rgba(73,188,247,.14)'

        }];

        var datas = [];
        for (var i = 0; i < plantCap.length; i++) {
            var item = plantCap[i];
            var itemToStyle = datalist[i];
            datas.push({
                name: item.value + '\n' + item.name,
                value: itemToStyle.offset,
                symbolSize: itemToStyle.symbolSize,
                label: {
                    normal: {
                        textStyle: {
                            fontSize: 14
                        }
                    }
                },

                itemStyle: {
                    normal: {
                        color: itemToStyle.color,
                        opacity: itemToStyle.opacity
                    }
                },
            })
        }
        option = {
            grid: {
                show: false,
                top: 10,
                bottom: 10
            },

            xAxis: [{
                gridIndex: 0,
                type: 'value',
                show: false,
                min: 0,
                max: 100,
                nameLocation: 'middle',
                nameGap: 5
            }],

            yAxis: [{
                gridIndex: 0,
                min: 0,
                show: false,
                max: 100,
                nameLocation: 'middle',
                nameGap: 30
            }],
            series: [{
                type: 'scatter',
                symbol: 'circle',
                symbolSize: 120,
                label: {
                    normal: {
                        show: true,
                        formatter: '{b}',
                        color: '#FFF',
                        textStyle: {
                            fontSize: '30'
                        }
                    },
                },
                itemStyle: {
                    normal: {
                        color: '#F30'
                    }
                },
                data: datas
            }]

        };
        myChart.setOption(option);
        $(document).ready(function () {
            myChart.resize();

        })
        window.addEventListener("resize", function () {
            myChart.resize();
        });
    </script>
    <script type="text/javascript" src="/template/static/shujukeshihua/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="/template/static/shujukeshihua/js/jquery.countup.min.js"></script>
    <script type="text/javascript">
        $('.counter').countUp();
    </script>
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
  <script type="text/javascript" src="/echarts.min.js"></script>
  <script type="text/javascript">
    var dom = document.getElementById('container');
    var myChart = echarts.init(dom, null, {
      renderer: 'canvas',
      useDirtyRect: false
    });
    var app = {};
    
    var option;

    const colors = ['#5470C6', '#EE6666'];
option = {
  color: colors,
  tooltip: {
    trigger: 'none',
    axisPointer: {
      type: 'cross'
    }
  },
  legend: {},
  grid: {
    top: 70,
    bottom: 50
  },
  xAxis: [
    {
      type: 'category',
      axisTick: {
        alignWithLabel: true
      },
      axisLine: {
        onZero: false,
        lineStyle: {
          color: colors[1]
        }
      },
      axisPointer: {
        label: {
          formatter: function (params) {
            return (
              '订单量  ' +
              params.value +
              (params.seriesData.length ? '：' + params.seriesData[0].data : '')
            );
          }
        }
      },
    data: [
        <?php if(is_array($timg) || $timg instanceof \think\Collection || $timg instanceof \think\Paginator): $i = 0; $__LIST__ = $timg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        '<?php echo $vo['date']; ?>',
        <?php endforeach; endif; else: echo "" ;endif; ?>
    ]
    },
    {
      type: 'category',
      axisTick: {
        alignWithLabel: true
      },
      axisLine: {
        onZero: false,
        lineStyle: {
          color: colors[0]
        }
      },
      axisPointer: {
        label: {
          formatter: function (params) {
            return (
             '销售额  ' +
              params.value +
              (params.seriesData.length ? '：' + params.seriesData[0].data : '')
            );
          }
        }
      },
    data: [
        <?php if(is_array($timg) || $timg instanceof \think\Collection || $timg instanceof \think\Paginator): $i = 0; $__LIST__ = $timg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        '<?php echo $vo['date']; ?>',
        <?php endforeach; endif; else: echo "" ;endif; ?>
    ]
    }
  ],
  yAxis: [
    {
      type: 'value'
    }
  ],
  series: [
    {
      name: '销售额',
      type: 'line',
      xAxisIndex: 1,
      smooth: true,
      emphasis: {
        focus: 'series'
      },
      data: [
        <?php if(is_array($timg) || $timg instanceof \think\Collection || $timg instanceof \think\Paginator): $i = 0; $__LIST__ = $timg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <?php echo round($vo['money'],2); ?>,
        <?php endforeach; endif; else: echo "" ;endif; ?>
          ]
    },
    {
      name: '订单量',
      type: 'line',
      smooth: true,
      emphasis: {
        focus: 'series'
      },
      data: [
        <?php if(is_array($timg) || $timg instanceof \think\Collection || $timg instanceof \think\Paginator): $i = 0; $__LIST__ = $timg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <?php echo round($vo['usercount'],2); ?>,
        <?php endforeach; endif; else: echo "" ;endif; ?>
      ]
    }
  ]
};

    if (option && typeof option === 'object') {
      myChart.setOption(option);
    }

    window.addEventListener('resize', myChart.resize);
  </script>
    <foot>
  <center><p><?php echo $subweb['oaname']; ?></p><p><?php echo $subweb['softname']; ?></p><p><?php echo $subweb['copyright']; ?></p></center>
  </foot>
</body>
</html>
