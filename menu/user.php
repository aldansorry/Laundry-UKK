<li class="<?php if($_GET['user'] == 'pembelian'){echo "active";}else{}?>"><a href="pembelian"><svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg>Pembelian</a></li>
<li class="<?php if($_GET['user'] == 'pilih'){echo "active";}else{}?>"><a href="pilih"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Transaksi</a></li>
<li class="<?php if($_GET['user'] == 'pemakaianbarang'){echo "active";}else{}?>"><a href="pemakaianbarang"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Pemakaian Barang</a></li>
<li class="parent ">
				<a href="">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Table</span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="table_transaksi">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Transaksi
						</a>
					</li>
					<li>
						<a class="" href="table_pembelian">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Pembelian
						</a>
					</li>
				</ul>
			</li>