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
														<th>操作</th>
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
														<td>
														<a href="{{url('call/edit/'.$v->call_id)}}"><button class="btn">编辑</button></a>
														<a href="{{url('call/destroy/'.$v->call_id)}}"><button class="btn btn-danger">删除</button></a>
														</td>
													</tr>								
                                                    @endforeach
													
												</tbody>
                                            </table>
                                            {{$callInfo->links()}}
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->

					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

@endsection