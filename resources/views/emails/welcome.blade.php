
<table style="color:#333;background:#fff;padding:0;margin:0;width:100%;font:15px 'Helvetica Neue',Arial,Helvetica" cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr width="100%">
			<td style="background:#eef8f7;font:15px 'Helvetica Neue',Arial,Helvetica" valign="top" align="left">
				<table style="border:none;padding:0 18px;margin:140px auto;width:500px">
					<tbody>
						<tr style="width:100%">
							<td style="background:#fff;padding:35px;border-radius:8px" valign="top" align="left">
								<img src="https://ci3.googleusercontent.com/proxy/k4wnBemWWQkFhE1v9g51T2aN0jL1fLwvJ1YqawHNlGQrPB--fw1irsMaA5_ZLUJn1rc-hcvvbtEeyM8GDO8xQ_ffae0=s0-d-e1-ft#https://www.streakboard.io//assets/images/logo.jpg" style="width:120px;height:auto;display:block;margin-left:auto;margin-right:auto;padding-top:15px;padding-bottom:15px" class="CToWUd">
								<p style="color:#142e3d;font:18px/1.5em 'Helvetica Neue',Arial,Helvetica;font-weight:bold;line-height:20px;text-align:center;padding-left:26px;padding-right:26px">{{ Auth::user()->name }} has invited you to join a team on Streak:  <span class="il"></span>. Please click the link below to join the team </p>
								<?php $id = session()->get('team_id'); ?>
								<p style="font:15px/1.25em 'Helvetica Neue',Arial,Helvetica;margin-bottom:0;text-align:center">
									<a href="{{ url('signup/'.$id) }}" style="border-radius:3px;background:#12a6b1;color:#fff;display:block;font-weight:600;font-size:17px;line-height:24px;margin:32px auto 24px;padding:11px 13px;text-decoration:none;width:152px" target="_blank" data-saferedirecturl="">Join</a>
								</p>

								<p style="font:14px/1.25em 'Helvetica Neue',Arial,Helvetica;color:#838c91;text-align:center;padding-left:56px;padding-right:56px;padding-bottom:8px">Streaks helps remote teams become more productive.
									<a href="https://streakboard.io/" style="color:#0079bf;text-decoration:none" target="_blank" data-saferedirecturl="">Visit <span class="il">Streak</span></a>
								</p>

							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
