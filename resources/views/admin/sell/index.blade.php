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
							<li class="active">业务员列表</li>
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
														<th>管理员名</th>
														<th>职业</th>
														<th>电话</th>
														<th>email</th>
														<th>添加时间</th>
														<th>操作</th>
													</tr>
												</thead>

												<tbody>
													<tr>
														<td>1</td>
														<td>admin</td>
														<td>php高级工程师</td>
														<td>13177878787</td>
														<td>3123@163.com</td>
														<td>2019-10-20 13:23:24</td>
														<td>
														<button class="btn">编辑</button>
														<button class="btn btn-danger">删除</button>
														</td>

													</tr>
													<tr>
														<td>1</td>
														<td>admin</td>
														<td>摄影师</td>
														<td>13177979797</td>
														<td>3VDD@163.com</td>
														<td>2019-10-20 13:23:24</td>
														<td>
														<button class="btn">编辑</button>
														<button class="btn btn-danger">删除</button>
														</td>

													</tr>										

													
												</tbody>
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->

					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

@endsection