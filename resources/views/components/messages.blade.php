<div>
    <table class="w-full">
        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-200 uppercase border-b border-gray-600">
            <td class="px-4 py-3">id</td>
            <td class="px-4 py-3">phone</td>
            <td class="px-4 py-3">content</td>
            <td class="px-4 py-3">status</td>
            <td class="px-4 py-3">provider</td>
            <td class="px-4 py-3">last change</td>
        </tr>
        <tbody class="bg-white">
        @foreach($messages as $message)
            <tr class="@if($loop->even) bg-gray-100 @endif">
                <td class="px-4 py-3 border">{{ $message->id }}</td>
                <td class="px-4 py-3 border">{{ $message->phone }}</td>
                <td class="px-4 py-3 border">{{ str($message->content)->substr(0, 15)->append(strlen($message->content) > 15 ? '...' : '') }}</td>
                <td class="px-4 py-3 border">{{ $message->status_message }}</td>
                <td class="px-4 py-3 border">{{ $message->provider }}</td>
                <td class="px-4 py-3 border">{{ $message->updated_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="my-3">
        {{ $messages->links() }}
    </div>
</div>