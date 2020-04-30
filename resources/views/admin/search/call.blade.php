@extends('layouts.crm')
@section('content')
<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="{{url('/index')}}">首页</a>
							</li>
							<li class="active">客户拜访列表</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
							<div class="row">
							

									<div class="col-xs-12">

									
									
										<div class="table-responsive">
                                            <form action="">
                                                <input type="text" placeholder="访问人" name="call_name"  @if(isset($search['call_name']))value="{{$search['call_name']}}"@endif>
                                                <input type="text" placeholder="访问地址" name="call_site"  @if(isset($search['call_site']))value="{{$search['call_site']}}"@endif >
                                                <input type="text" placeholder="访问详情" name="call_desc"  @if(isset($search['call_desc']))value="{{$search['call_desc']}}"@endif>
                                                业务员：<select name="sell_id" id="">
                                                    <option value="">--请选择--</option>
                                                    @foreach($sell as $s)
                                                    <option value="{{$s->sell_id}}" @if(isset($search['sell_id']))  @if($search['sell_id']==$s->sell_id) selected @endif @endif>{{$s->sell_name}}</option>
                                                    @endforeach
                                                </select>
                                                客户:   <select name="client_id" id="">
                                                    <option value="">--请选择--</option>
                                                    @foreach($client as $c)
                                                    <option value="{{$c->client_id}}" @if(isset($search['client_id']))  @if($search['client_id']==$c->client_id) selected @endif @endif>{{$c->client_name}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" placeholder="访问时间" class="time" name="call_time" @if(isset($search['call_time']))value="{{$search['call_time']}}"@endif>
                                                <input type="text" placeholder="下次访问时间" class="abc" name="next_time" @if(isset($search['next_time']))value="{{$search['next_time']}}"@endif>
                                                <button>搜索</button>
                                            </form>
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>ID</th>
														<th>访问人</th>
														<th>访问地址</th>
														<th>访问详情</th>
														<th>业务员名称</th>
                                                        <th>客户名称</th>
                                                        <th>访问时间</th>
                                                        <th>下次访问时间</th>
													</tr>
												</thead>

												<tbody>
                                                    @foreach($callInfo as $v)
													<tr>
														<td>{{$v->call_id}}</td>
														<td>{{$v->call_name}}</td>
														<td>{{$v->call_site}}</td>
														<td>{{$v->call_desc}}</td>
														<td>{{$v->sell_name}}</td>
                                                        <td>{{$v->client_name}}</td>
                                                        <td>{{$v->call_time}}</td>
                                                        <td>{{$v->next_time}}</td>
													</tr>								
                                                    @endforeach
													
												</tbody>
                                            </table>
                                            {{$callInfo->appends($search)->links()}}
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->

					</div><!-- /.page-content -->
                </div><!-- /.main-content -->
                <script src="/laydate/laydate.js"></script>
    <script>
    //执行一个laydate实例
    //时间选择器
    laydate.render({
    elem: '.time',type: 'datetime'
    });
    laydate.render({
    elem: '.abc',type: 'datetime'
    });
    </script>

@endsection