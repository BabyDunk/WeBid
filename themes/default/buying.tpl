<!-- INCLUDE user_menu_header.tpl -->

<table width="100%" border="0" cellspacing="1" cellpadding="4">
<!-- BEGIN items -->
	<tr valign="top">
		<td colspan="4">
			{L_458}
			<b><a href="item.php?id={items.ID}" target="_blank">{items.TITLE}</a></b>
			(ID: <a href="item.php?id={items.ID}" target="_blank">{items.ID}</a> - {L_25_0121} {items.ENDS})
		</td>
	</tr>
	<tr>
		<th width="25%">
			{L_125}
		</th>
		<th width="20%">
			{L_460}
		</th>
		<th width="15%">
			{L_461}
		</th>
		<th width="10%">
			{L_284}
		</th>
		<th width="10%">
			{L_189}
		</th>
	</tr>
	<tr valign="top">
		<td width="30%" >
			{items.SELLNICK}&nbsp;&nbsp;{items.FB_LINK}
		</td>
		<td width="20%">
			<a href="mailto:{items.SELLEMAIL}">{items.SELLEMAIL}</a>
		</td>
		<td width="15%" align="right">
			{items.FBID}
		</td>
		<td width="15%" align="center">
			{items.QTY}
		</td>
		<td width="15%" align="right">
			{items.TOTAL}
		</td>
	</tr>
<!-- END items -->
</table>

<!-- INCLUDE user_menu_footer.tpl -->