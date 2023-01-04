@extends('smart-ads::layouts.app')
@section('content')
<div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Create New Ad
        </h2>

        <form action="/smart-ad-manager/ads/store" method="POST">
            @csrf
        <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Ad Name" name="name" value="{{old('name')}}"
                />
                @error('name')
                <span class="text-xs text-red-600 dark:text-red-400">
                  {{$message}}
                </span>
                @enderror
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Ad Body</span>
                <textarea
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  rows="7"
                  placeholder="Enter html body of the form." name="body"
                >{{old('body')}}</textarea>
                @error('body')
                <span class="text-xs text-red-600 dark:text-red-400">
                  {{$message}}
                </span>
                @enderror
              </label>

              <div x-data="{
                selected: null,
                toggle(event){
                  var collapseRef = event.currentTarget.getAttribute('aria-controls');

                  this.selected = (collapseRef !== this.selected) ? collapseRef : null;
                },
                isAccordionOpen(collapseRef){
                    return this.selected == collapseRef ? true : false;
                },
                defaultOpen(collapseRef){
                    this.selected = collapseRef;
                }
              }" class="my-3">
                <div x-id="['accordion-item']" class="bg-white border">
                    <div class="mb-0 font-lg">
                    <button x-on:click="toggle" type="button" :aria-expanded="isAccordionOpen($id('accordion-item'))" :aria-controls="$id('accordion-item')" class="flex items-center justify-between p-3 w-full focus:border focus:border-blue-200" :class="isAccordionOpen($id('accordion-item')) &amp;&amp; 'bg-blue-100 text-blue-800'" @keydown.space.prevent.stop="toggle">
                        <span class="font-semibold">Automatic Ad Insertion (Optional)</span>
                        <span>
                            <svg class="rotate-0 h-6 w-6 transform" :class="isAccordionOpen($id('accordion-item')) && 'rotate-180'" x-transition="" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                          </span>
                        </button>
                    </div>
                    <div :id="$id('accordion-item')" x-show="isAccordionOpen($id('accordion-item'))" x-cloack="" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="scale-y-0" x-transition:enter-end="scale-y-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="scale-y-100" x-transition:leave-end="scale-y-0" class="transition-transform ease-out overflow-hidden origin-top transform p-3">

                      <div x-data="{
                            fields: [
                              {
                                position: '',
                                selector: '',
                              }
                              ],
                            addNewField() {
                                this.fields.push({
                                    position: '',
                                    selector: ''
                                });
                              },
                              removeField(index) {
                                this.fields.splice(index, 1);
                              }
                            }">
                        <template x-for="(field, index) in fields" :key="index">
                          <div class="rounded bg-gray-200 border border-gray-400 p-2 my-3">
                            <div class="text-red-500 text-sm cursor-pointer" @click="removeField(index)">Remove</div>
                            <label class="block mt-2 text-sm">
                              <span class="text-gray-700 dark:text-gray-400">Ad Position <span x-text="index+1"></span></span>
                              <select :name="'placements['+index+'][position]'" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option value="">None</option>
                                <option value="beforebegin">Before HTML Selector</option>
                                <option value="afterend">After HTML Selector</option>
                                <option value="afterbegin">Inside HTML Selector (At Beginning)</option>
                                <option value="beforeend">Inside HTML Selector (At End)</option>
                              </select>
                            </label>

                            <label class="block mt-4 text-sm">
                              <span class="text-gray-700 dark:text-gray-400">Selector <span x-text="index+1"></span></span>
                              <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="CSS Selector like #id-name / .class-name / body > p" :name="'placements['+index+'][selector]'" value="{{old('name')}}"
                              />
                            </label>
                          </div>
                        </template>
                        <div class="text-sm mt-2 cursor-pointer" @click="addNewField()">Add More placement</div>                        
                      </div>

                      
                    </div>
                </div>
              </div>

              <div class="my-3">
                <button type="submit" class="inline-flex items-center rounded-md  bg-purple-600 border border-transparent active:bg-purple-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Add</button>
              </div>

            </div>
        </form>



</div>
@endsection