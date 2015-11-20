<p>After visiting a childhood friend, Chef wants to get back to his home. Friend lives at the first street, and Chef himself lives at the <b>N</b>-th (and the last) street. Their city is a bit special: you can move from the <b>X</b>-th street to the <b>Y</b>-th street if and only if 1 &lt;= <b>Y</b> - <b>X</b> &lt;= <b>K</b>, where <b>K</b> is the integer value that is given to you. Chef wants to get to home in such a way that the product of all the visited streets' special numbers is minimal (including the first and the <b>N</b>-th street). Please, help him to find such a product. </p>
<h3>Input</h3>
<p>The first line of input consists of two integer numbers - <b>N</b> and <b>K</b> - the number of streets and the value of <b>K</b> respectively. The second line consist of <b>N</b> numbers  - <b>A<sub>1</sub></b>, <b>A<sub>2</sub></b>, ..., <b>A<sub>N</sub></b> respectively, where <b>A<sub>i</sub></b> equals to the special number of the <b>i</b>-th street.</p>
<h3>Output</h3>
<p>Please output the value of the minimal possible product, modulo <b>1000000007</b>.</p>
<h3>Constraints</h3>
<ul>
	<li><b>1</b> ≤ <b>N</b> ≤ <b>10^5</b></li>
	<li><b>1</b> ≤ <b>A<sub>i</sub></b> ≤ <b>10^5</b></li>
	<li><b>1</b> ≤ <b>K</b> ≤ <b>N</b></li>
</ul>
<h3>Example</h3>
<pre><b>Input:</b>
	4 2
	1 2 3 4.
	<b>Output:</b>
	8
</pre><h3>Scoring</h3>
<p>Subtask 1 (30 points): <b>N</b> &lt;= 80 <br><br>
Subtask 2 (70 points): See the constraints.</p>

<hr>
<table cellspacing="0" cellpadding="0" align="left">
	<tbody>
		
		<tr>
			<td width="14%">Author:</td>
			<td>
				<a href="https://www.codechef.com/users/furko" data-bindattr-277="277">furko</a>
			</td>
		</tr>
		
		
		<tr>
			<td width="14%">Tags:</td>
			<td><a class="problem-tag-small " href="https://www.codechef.com/tags/problems/dp">
				dp
			</a><a class="problem-tag-small " href="https://www.codechef.com/tags/problems/easy-medium">
			easy-medium
		</a><a class="problem-tag-small " href="https://www.codechef.com/tags/problems/furko">
		furko
	</a><a class="problem-tag-small " href="https://www.codechef.com/tags/problems/ltime08">
	ltime08
</a></td>
</tr>


<tr>
<td width="14%">Date Added:</td>
<td>21-01-2014</td>
</tr>

<tr>
<td width="14%">Time Limit:</td>
<td>1 sec</td>
</tr>
<tr>
<td width="14%">Source Limit:</td>
<td>50000 Bytes</td>
</tr>
<tr>
<td width="14%">Languages:</td>
<td>ADA, ASM, BASH, BF, C, C99 strict, CAML, CLOJ, CLPS, CPP 4.3.2, CPP 4.9.2, CPP14, CS2, D, ERL, FORT, FS, GO, HASK, ICK, ICON, JAVA, JS, LISP clisp, LISP sbcl, LUA, NEM, NICE, NODEJS, PAS fpc, PAS gpc, PERL, PERL6, PHP, PIKE, PRLG, PYTH, PYTH 3.1.2, RUBY, SCALA, SCM guile, SCM qobi, ST, TCL, TEXT, WSPC</td>
</tr>
</tbody>
</table>
</div>
