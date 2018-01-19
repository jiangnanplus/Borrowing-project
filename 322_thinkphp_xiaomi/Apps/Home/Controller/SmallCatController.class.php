<?php
 /*
   * 这是个顶部微型购物车的控制器 主要是ajax的形式获取信息
   */
namespace Home\Controller;
use Think\Controller;
class SmallCatController extends Controller {

	//查询小购物车中的商品
	public function myGoods(){
		$cat_status=0;  //标志0失败 1成功
		$session_info=session('shopcart');
		// var_dump($session_info);
		// die;

		//判断购物车是否有商品
		if($session_info){
		    //如果存在就进行遍历想要的数据 对数据遍历想要的形式
			$new_sort_goods=array();
			foreach($session_info as $info){
			    
			    $goods_id=$info['gid'];
				//到数据查询要的信息 名字
			    $goods_info=M('goods')->where(array('gid'=>$goods_id))->field('title,s_img')->select();
				if(!$goods_info){
				     continue;
				}
				//检索主图
                // $s_img=json_decode($info['s_img'],true);
                // $zhupic=array();
                // foreach($s_img as $ke=>$ve){
                //     $zhupic[]=$ve[0];

                // }
                // var_dump($zhupic[0]);
                // die;
				$data['gid']=$goods_id;
				$data['title']=$goods_info[0]['title'];
				$data['s_img']=$info['s_img'];
				$data['number']=$info['number'];
				$data['price']=$info['price'];
				$new_sort_goods[]=$data;
			 
			}
			// var_dump($new_sort_goods);
			// die;

			//往前台显示
			if(count($new_sort_goods)){
				$cat_total_num=0; 
				$cat_total_price=0;

				foreach($new_sort_goods as $new_goods){
				    
			        $url=U('Detail/index',array('g'=>$new_goods['gid']));
					$tiny_pic="/xm/public/Upload/Goods/".$new_goods['s_img'];
					 
				$str.=<<<EOF
				<li class="clearfix "><a class="pic" href="{$url}"><img src="{$tiny_pic}?width=60&height=60" alt=""></a><a class="name" href="{$url}">{$new_goods['title']}</a><span class="price">{$new_goods['price']} x {$new_goods['number']}</span><a class="btn-del delItem" data-isbigtap="false" gid="{$new_goods['gid']}" href="javascript: void(0);"><i class="iconfont"></i></a><input type="hidden" name="goods_id" value="{$new_goods['gid']}"></li>
EOF;
                   $cat_total_num+=$new_goods['number'];
				   $cat_total_price+=$new_goods['number']*$new_goods['price'];
			       
			 
			 
			 
			    }
			  





				$cat_status=1;	
			}else{
				$cat_status=0;
			}



		}else{
			$cat_status=0;
		}
		$cat_data['cat_status']=$cat_status;
		$cat_data['content']=array('total_nums'=>$cat_total_num,'total_price'=>$cat_total_price);
		$cat_data['info']=$str;
	   
	    echo json_encode($cat_data);	
	}

	//删除小购物车的商品
	public function delGoods(){
	    //删除商品 ajax实现
		$del_status=0; //删除成功是否的标志 0失败 1成功
		$goods_id=I('post.goods_id');//删除的商品id
		 
		$session_info=session('shopcart');
		 
		if(empty($goods_id)){
		     $del_status=0;
		}else{
		    $new_session=array();  //执行删除后存的数组
		    foreach($session_info as $info){
			    if($info[gid]!=$goods_id){
				    $new_session[]=$info;
				}
			 
			}
			//计算新的数目和总金额
			$total_num=0;
			$total_money=0;
			foreach($new_session as $info){
			    $total_num+=$info['number'];
				$total_money+=$info['number']*$info['price'];
			  
			  
			}
			session('shopcart',$new_session);
			$del_status=1;
			 
		  
		  
		}
	 
	    $data['del_status']=$del_status;
		$data['total_num']=$total_num;
		$data['total_money']=$total_money;
		echo json_encode($data);
	 
	}


}

?>