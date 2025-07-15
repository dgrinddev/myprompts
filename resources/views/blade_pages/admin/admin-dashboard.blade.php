@php
	$titleKey = $titleKey ?? 'shared/title.blade_pages__admin__admin_dashboard'; // Standard hvis ikke angivet
	$titleParams = $titleParams ?? []; // Standard hvis ikke angivet
	$headerKey = 'layouts/admin.header.admin__admin_pages__admin_dashboard';
	$subHeaderKey = 'layouts/admin.subHeader.admin__admin_pages__admin_dashboard';
@endphp

<x-layouts.app.admin
	:title-key="$titleKey"
	:title-params="$titleParams"
	:header-key="$headerKey"
	:sub-header-key="$subHeaderKey"
	class=""
>

	<div class="flex flex-col gap-6">
		<p>Dette er mit admin dashboard</p>
	</div>

</x-layouts.app.admin>