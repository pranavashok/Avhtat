/* Gallery Script */
// ====================================================================== 
// script by Gerard Ferrandez | February, 2010 
// -------------------------------------------------------------------- 
// http://www.dhteumeuleu.com | http://www.twitter.com/ge1doot 
// Javascript code licensed under CC-BY-NC - Do not remove this notice 
// ====================================================================== 
 
var res = function () { 
	// ---- private vars ---- 
	var scr, a0, a1, 
		divs   = new Array(), 
		moves  = new Array(), 
		idle = false, 
		nw, nh, wu, hu, 
		mx = [1,0,-1,0,2,0,-2,0,3,0,-3,0,4,0,-4,0], 
		my = [0,1,0,-1,0,2,0,-2,0,3,0,-3,0,4,0,-4], 
		bw = 10; 
 
	//////////////////////////////////////////////////////////////////////////// 
	// ============== grid class ============= 
	var grid = { 
		// ===== calculate grid ===== 
		calc : function () { 
			// ---- empty grid ---- 
			this.grid = new Array(24); 
			for (var i = 0; i < 24; i++) 
				this.grid[i] = 0; 
			// ---- load grid ---- 
			var i = 0, o; 
			while ( o = divs[i++] ) 
				this.add(o); 
		}, 
		// ===== return cell value ===== 
		cell : function (x, y) { 
			return this.grid[x * 4 + y]; 
		}, 
		// ===== area weight ===== 
		weight : function (x, y, w, h) { 
			var gw = 0; 
			for(var i = 0; i < w; i++) 
				for(var j = 0; j < h; j++) 
					gw += this.cell(i + x, j + y); 
			return gw; 
		}, 
		// ===== add div ===== 
		add : function (o) { 
			for(var i = 0; i < o.w; i++) 
				for(var j = 0; j < o.h; j++) 
					this.grid[(i + o.x) * 4 + (j + o.y)] += o.f ? 20 : 1; 
		} 
	} 
 
	//////////////////////////////////////////////////////////////////////////// 
	// ============== tween class ============= 
	var tween = { 
		// ===== tween stack ===== 
		divs : new Array(), 
		// ===== create tween object ===== 
		tween : function (o, x, y, w, h) { 
			return { 
				div : o, 
				x : x, 
				y : y, 
				w : w, 
				h : h 
			}; 
		}, 
		// ===== add new tween ===== 
		add : function (o, x, y, w, h) { 
			if (o == true) return false; 
			// ---- consolidate with last move ---- 
			var t = this.divs.length - 1; 
			if (t >= 0 && this.divs[t].div == o) 
				this.divs[t] = this.tween(o, x, y, w, h); 
			else { 
				// ---- push tween ---- 
				this.divs.push( 
					this.tween(o, x, y, w, h) 
				); 
			} 
		}, 
		// ======== start next tween ========= 
		next : function () { 
			if (this.divs.length) { 
				var t = this.divs[0]; 
				var o = t.div; 
				o.dx = t.x - o.xc; 
				o.dy = t.y - o.yc; 
				o.dw = t.w - o.wc; 
				o.dh = t.h - o.hc; 
				o.s = 1; 
				o.p = 0; 
				return o; 
			} else return false; 
		} 
	} 
	//////////////////////////////////////////////////////////////////////////// 
	// =============== Div constructor =============== 
	var Frame = function (i, div) { 
		// ---- random position ---- 
		do { 
			this.x = this.x0 = Math.floor(Math.random() * 6); 
			this.y = this.y0 = Math.floor(Math.random() * 4); 
		} while (moves[this.x * 4 + this.y]); 
		moves[this.x * 4 + this.y] = true; 
		// ---- dimensions ---- 
		var img = div.getElementsByTagName("img")[0]; 
		var wh = img.alt.split(","); 
		img.alt = ""; 
		this.w = 1; 
		this.h = 1; 
		this.xc = this.x + .5; 
		this.yc = this.y + .5; 
		this.wc = 0; 
		this.hc = 0; 
		this.w1 = wh[0] * 1; 
		this.h1 = wh[1] * 1; 
		this.i = i; 
		this.s = 0; 
		div.parent = this; 
		div.onclick = function () { this.parent.click(); } 
		this.css = div.style; 
		// ---- push tween ---- 
		tween.add(this, this.x, this.y, 1, 1); 
	} 
 
	// ========== calculate moving cost =========== 
	Frame.prototype.costMove = function (m) { 
		// ---- what direction ---- 
		var sx = mx[m] > 0 ? 1 : mx[m] < 0 ? -1 : 0, 
		    sy = my[m] > 0 ? 1 : my[m] < 0 ? -1 : 0, 
		    cm = 0; 
		// ---- horizontal ---- 
		if (sx != 0) { 
			for (var i = this.x; i != this.x + mx[m]; i += sx) 
				cm += grid.weight(i, this.y, this.w, this.h); 
		// ---- vertical ---- 
		} else if (sy != 0) { 
			for (var i = this.y; i != this.y + my[m]; i += sy) 
				cm += grid.weight(this.x, i, this.w, this.h); 
		} 
		// ---- return cost ---- 
		return cm; 
	} 
 
	// ============ determine moving direction ============= 
	Frame.prototype.findMove = function () { 
		var d = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0], 
		    mx = 1000, 
		    cm, m; 
		// =========== loop distance ============ 
		for (var p = 0; p < 4 && mx >= 20; p++) { 
			// ======== vertical neighbors weights ======== 
			for (var i = 0; i < this.w; i++) { 
				// ---- up ---- 
				if (this.y - p > 0) 
					d[3 + p * 4] += grid.cell(this.x + i, this.y - (p + 1)); 
				else 
					// ---- border ---- 
					d[3 + p * 4] = 100; 
				// ---- bottom ---- 
				if (this.y + p + this.h < 4) 
					d[1 + p * 4] += grid.cell(this.x + i, this.y + this.h + p); 
				else 
					// ---- border ---- 
					d[1 + p * 4] = 100; 
			} 
			// ======== horizontal neighbors weights ======== 
			for (var j = 0; j < this.h; j++) { 
				// ---- left ---- 
				if (this.x - p > 0) 
					d[2 + p * 4] += grid.cell(this.x - (p + 1), this.y + j); 
				else 
					// ---- border ---- 
					d[2 + p * 4] = 100; 
				// ---- right ---- 
				if (this.x + this.w + p < 6) 
					d[0 + p * 4] += grid.cell(this.x + this.w + p, this.y + j); 
				else 
					// ---- border ---- 
					d[0 + p * 4] = 100; 
			} 
			// =============== find direction to the weakest neighbor ================ 
			mx = 1000; 
			for (var i = 0; i < 4 * (p + 1); i++) { 
				if ( d[i] < mx) { 
					// ---- store min values ---- 
					mx = d[i]; 
					m = i; 
					cm = this.costMove(i); 
				// ---- equality case ---- 
				} else if ( d[i] == mx) { 
					// ---- less costly move ---- 
					var cmm = this.costMove(i); 
					if (cmm < cm) { 
						cm = cmm; 
						m = i; 
						mx = d[i]; 
					} 
				} 
			} 
		} 
		// ====== return direction [0 = right, 1 = bottom, 2 = left, 3 = up] ====== 
		return m; 
	} 
 
	// ============ HTML rendering ============= 
	Frame.prototype.paint = function () { 
		this.css.left   = Math.round(bw + this.xc * wu) + "px"; 
		this.css.top    = Math.round(bw + this.yc * hu) + "px"; 
		this.css.width  = Math.round(Math.max(0, this.wc * wu - bw)) + "px"; 
		this.css.height = Math.round(Math.max(0, this.hc * hu - bw)) + "px"; 
	} 
 
	// ========== easing function ============== 
	Frame.prototype.tween = function () { 
		if (this.s != 0) { 
			// ---- easing ---- 
			this.p += this.s; 
			this.xc += this.dx * this.p * .01; 
			this.yc += this.dy * this.p * .01; 
			this.wc += this.dw * this.p * .01; 
			this.hc += this.dh * this.p * .01; 
			// ---- HTML rendering ---- 
			this.paint(); 
			// ---- percentage steps [1+2+3+4+5+6+7+8+9+10+9+8+7+6+5+4+3+2+1=100] ---- 
			if (this.p == 10) 
				// ---- reverse acceleration 
				this.s = -1; 
			else if (this.p == 0) 
				// ---- moving end 
				this.s = false; 
		} 
		return this.s; 
	} 
 
	// ============= Main IA function for moving divs =============== 
	Frame.prototype.click = function () { 
		if (moves.length) { 
			var i = 0, o; 
			while ( o = moves[i++] ) { 
				o.f = false; 
				// ---- zoom out ---- 
				if (o.w != 1 || o.h != 1) { 
					o.w = 1; 
					o.h = 1; 
					tween.add(o, o.x, o.y, o.w, o.h); 
				} 
			} 
		} 
		// ---- stop here if same div ---- 
		if (moves[0] == this) 
			moves = new Array(); 
		else { 
			// ---- init grid weights ---- 
			moves = new Array(); 
			grid.calc(); 
			// =========== find the best place for the zoomed div =========== 
			var mvx = 0, 
			    mvy = 0; 
			// ---- right border limit ---- 
			if (this.y + this.h1 > 3) 
				this.y -= this.y + this.h1 - 4; 
			else { 
				// ---- vertical backward move ---- 
				for (var i = this.y - 1; i > this.y - this.h - 1; i--) 
					if (i >= 0 && grid.weight(this.x, i, this.w1, 1) == 0) 
						mvy++; 
			} 
			// ---- bottom border limit ---- 
			if (this.x + this.w1 > 5) 
				this.x -= this.x + this.w1 - 6; 
			else if (!mvy) { 
				// ---- horizontal backward move ---- 
				for (var i = this.x - 1; i > this.x - this.w - 1; i--) 
					if (i >= 0 && grid.weight(i, this.y, 1, this.h1) == 0) 
						mvx++; 
			} 
			// ============ move zoomed div ============= 
			this.x -= mvx; 
			this.y -= mvy; 
			this.w = this.w1; 
			this.h = this.h1; 
			this.f = true; 
			this.findMove(); 
			grid.add(this); 
			moves.push(this); 
			// ========= cascading child moves ========== 
			var k = 0, o; 
			// ---- loop through all divs ---- 
			while ( o = divs[k++] ) { 
				// ---- skip frozen div ---- 
				if (o.f != true) { 
					// ---- loop through all cells ---- 
					for (var i = 0; i < o.w; i++) { 
						for (var j = 0; j < o.h; j++) { 
							// ---- collision (non empty cell) ---- 
							if (grid.cell(i + o.x, j + o.y) > 1) { 
								// ---- move to a better place ---- 
								var m = o.findMove(); 
								o.x += mx[m]; 
								o.y += my[m]; 
								// ---- not inside another one ? ---- 
								if (grid.weight(o.x, o.y, o.w, o.h) < 20) { 
									// ---- freeze div and push move ---- 
									o.f = true; 
									grid.add(o); 
									moves.push(o); 
									// ---- reset main loop and exit ---- 
									k = 0; 
									break; 
								} 
							} 
						} 
						if (o.f) break; 
					} 
				} 
			} 
			// ========= push moves in reverse order ========= 
			var i = moves.length, o; 
			while ( o = moves[--i] ) 
				tween.add(o, o.x, o.y, o.w, o.h); 
		} 
		// ---- start tweens engine ---- 
		a0 = tween.next(); 
		if (idle) { 
			idle = false; 
			run(); 
		} 
	} 
 
	// ============== main loop ================ 
	var run = function () { 
		// ---- first tween ---- 
		if (a0) { 
			a0.tween(); 
			if (a0.p == 10) { 
				// ---- next ---- 
				a1 = a0; 
				tween.divs.splice(0,1); 
				a0 = tween.next(); 
			} 
		} 
		// ---- second tween ---- 
		if (a1) { 
			a1.tween(); 
			// ---- end anim ---- 
			if (a1.s === false) 
				a1 = false; 
		} 
		// ---- loop ---- 
		if (a0 || a1) setTimeout(run, 32); 
		else idle = true; 
	} 
	// ============== init script ============== 
	var init = function () { 
		// ---- init container ---- 
		scr = document.getElementById('screen'); 
		// ---- load divs ---- 
		var k = 0, o; 
		while ( o = scr.getElementsByTagName("div")[k++] ) 
			divs.push( 
				new Frame(k, o) 
			); 
		// ---- ajust dimensions ---- 
		nw = scr.offsetWidth - bw; 
		nh = scr.offsetHeight - bw; 
		wu = nw / 6; 
		hu = nh / 4; 
		// ---- start animation ----- 
		a0 = tween.next(); 
		run(); 
	} 
	return { 
		// ==== public bloc ==== 
		init : init 
	} 
}(); 
/* Gallery ends */
