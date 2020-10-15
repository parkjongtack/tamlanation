<?php
	// 페이지 리스트 출력
	function print_pagelist($page, $total, $page_set, $block_set, $params) {

		$total_page = ceil ($total / $page_set); // 총페이지수(올림함수)
		$total_block = ceil ($total_page / $block_set); // 총블럭수(올림함수)
		
		$block = ceil ($page / $block_set); // 현재블럭(올림함수)
		 
		// 페이지번호 & 블럭 설정
		$first_page = (($block - 1) * $block_set) + 1; // 첫번째 페이지번호
		$last_page = min ($total_page, $block * $block_set); // 마지막 페이지번호
		 
		$prev_page = $page - 1; // 이전페이지
		$next_page = $page + 1; // 다음페이지
		 
		$prev_block = $block - 1; // 이전블럭
		$next_block = $block + 1; // 다음블럭
		 
		// 이전블럭을 블럭의 마지막으로 하려면...
		$prev_block_page = $prev_block * $block_set; // 이전블럭 페이지번호

		if($prev_block_page <= 0) $prev_block_page = 1;

		// 이전블럭을 블럭의 첫페이지로 하려면...
		//$prev_block_page = $prev_block * $block_set - ($block_set - 1);
		$next_block_page = $next_block * $block_set - ($block_set - 1); // 다음블럭 페이지번호

		if($next_block_page <= 0) $next_block_page = 1;
		if($next_block_page > $total_page) $next_block_page = $total_page;
?>
					<div class="number_list_con" style="margin-top:10px;text-align:center;">
						<div class="btn_con" style="display:inline-block;">
							<ul>
								<li style="display:inline-block;">
									<a href="<?=$_SERVER['PHP_SELF']?>?page=1&<?=$params?>">
										<img src="/img/sub/number_list_prev2_btn.png" alt="번호목록 이전 버튼" />
									</a>
								</li>
								<li style="display:inline-block;">
									<a href="<?=$_SERVER['PHP_SELF']?>?page=<?=$prev_block_page?>&<?=$params?>">
										<img src="/img/sub/number_list_prev_btn.png" alt="번호목록 이전 버튼" />
									</a>
								</li>
							</ul>
						</div>

						<div class="list_con" style="display:inline-block;padding-left:10px;">
							<?php for ($i=$first_page; $i<=$last_page; $i++) { ?>
							<a href="<?=$_SERVER['PHP_SELF']?>?page=<?=$i?>&<?=$params?>" class="list_a <?php if($i==$page){ ?>on<?php } ?>"><?=$i?></a>
							<?php } ?>
						</div>

						<div class="btn_con" style="display:inline-block;padding-left:10px;">
							<ul>
								<li style="display:inline-block;">
									<a href="<?=$_SERVER['PHP_SELF']?>?page=<?=$next_block_page?>&<?=$params?>">
										<img src="/img/sub/number_list_next_btn.png" alt="번호목록 다음 버튼" />
									</a>
								</li>
								<li style="display:inline-block;">
									<a href="<?=$_SERVER['PHP_SELF']?>?page=<?=$total_page?>&<?=$params?>">
										<img src="/img/sub/number_list_next2_btn.png" alt="번호목록 다음 버튼" />
									</a>
								</li>
							</ul>
						</div>
					</div>
<?php
	}
?>
