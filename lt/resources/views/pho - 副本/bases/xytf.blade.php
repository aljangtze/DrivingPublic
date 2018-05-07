<div class="footer_nav">
  		<ul>
			<li>
				<a href="{{ url('tel/xyxc')."/".session()->get("Teluser") }}">
					<img src="{{ asset('phone/images/bm.png') }}" alt="报名"/>
					<p>报名</p>
				</a>	
			</li>
			<li>
				<a href="{{ url('tel/xylz')."/".session()->get("Teluser") }}">
					<img src="{{ asset('phone/images/yz.png') }}" alt="有证"/>
					<p>有证</p>
				</a>	
			</li>
			<li>
				<a href="{{ url('tel/xyqz')."/".session()->get("Teluser") }}">
					<img src="{{ asset('phone/images/qz.png') }}" alt="常用"/>
					<p>圈子</p>
				</a>	
			</li>
			<li>
				<a href="{{ url('tel/xycenter')."/".session()->get("Teluser") }}">
					<img src="{{ asset('phone/images/wd.png') }}" alt="我的"/>
					<p>我的</p>
				</a>	
			</li>
		</ul>
  </div>