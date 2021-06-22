<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0">
                <form action="{{ route('post.save') }}" method="POST">
                    @csrf
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-4 gap-6">
                                <div class="col-span-1 sm:col-span-2">
                                    <label for="title"
                                           class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                                               class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300"
                                               placeholder="Post title">
                                    </div>
                                    @error('title')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-1 sm:col-span-2">
                                    <label for="date"
                                           class="block text-sm font-medium text-gray-700">{{ __('Publish date') }}</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="date" name="publication_date" id="publication_date"
                                               value="{{ old('publication_date', date("Y-m-d")) }}"
                                               class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300">
                                    </div>
                                    @error('publication_date')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="description"
                                       class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                                <div class="mt-1">
                                            <textarea id="description" name="description" rows="6"
                                                      class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                            >{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
