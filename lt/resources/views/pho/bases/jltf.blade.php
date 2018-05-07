
    <div class="footer_nav">
  		<ul>
			<li>
				<a href="{{ url('jtel/navjx')."/".session()->get("jTeluser") }}">
					<img src="{{ asset('phone/images/dhxy.png') }}" alt="对话学员"/>
					<p>对话学员</p>
				</a>	
			</li>
			<li>
				<a href="{{ url('tel/lz')."/".session()->get("Teluser") }}">
					<img src="{{ asset('phone/images/byw.png') }}" alt="办业务"/>
					<p>办业务</p>
				</a>	
			</li>
			<li>
				<a href="{{ url('tel/qz')."/".session()->get("Teluser") }}">
					<img src="{{ asset('phone/images/qz.png') }}" alt="圈子"/>
					<p>圈子</p>
				</a>	
			</li>
			<li>
				<a href="{{ url('tel/jlcenter')."/".session()->get("Teluser") }}">
					<img src="{{ asset('phone/images/wd.png') }}" alt="我的"/>
					<p>我的</p>
				</a>	
			</li>
		</ul>
  </div>