<x-app-layout title="Testimoni">
    <div class="customer-reviews-head text-center">
        <h4 class="title-2">Customer Reviews</h4>
        {{-- <div class="product-ratting">
            <ul>
                <li><a href="#"><i class="fas fa-star"></i></a></li>
                <li><a href="#"><i class="fas fa-star"></i></a></li>
                <li><a href="#"><i class="fas fa-star"></i></a></li>
                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                <li><a href="#"><i class="far fa-star"></i></a></li>
                <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
            </ul>
        </div> --}}
    </div>
    <hr>
    <div class="center">
        <div class="col-lg-9">
            <!-- comment-area -->
            <div class="ltn__comment-area mb-30">
                <div class="ltn__comment-inner">
                    <ul>
                        <li>
                            <div class="ltn__comment-item clearfix">
                                <div class="ltn__commenter-img">
                                    <img src="{{ asset('assets/img/testimonial/1.jpg') }}" alt="Image">
                                </div>
                                <div class="ltn__commenter-comment">
                                    <h6><a href="#">Adam Smit</a></h6>
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                    <span class="ltn__comment-reply-btn">September 3, 2020</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ltn__comment-item clearfix">
                                <div class="ltn__commenter-img">
                                    <img src="{{ asset('assets/img/testimonial/3.jpg')  }}" alt="Image">
                                </div>
                                <div class="ltn__commenter-comment">
                                    <h6><a href="#">Adam Smit</a></h6>
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                    <span class="ltn__comment-reply-btn">September 2, 2020</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ltn__comment-item clearfix">
                                <div class="ltn__commenter-img">
                                    <img src="{{ asset('assets/img/testimonial/2.jpg') }}" alt="Image">
                                </div>
                                <div class="ltn__commenter-comment">
                                    <h6><a href="#">Adam Smit</a></h6>
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                    <span class="ltn__comment-reply-btn">September 2, 2020</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<div class="customer-reviews-head text-center">
    <!-- comment-reply -->
    <div class="ltn__comment-reply-area ltn__form-box mb-60">
        <form action="#">
            <h4 class="title-2">Add a Review</h4>
            {{-- <div class="mb-30">
                <div class="add-a-review">
                    <h6>Your Ratings:</h6>
                    <div class="product-ratting">
                        <ul>
                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                            <li><a href="#"><i class="far fa-star"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-9 mt-2">
                <div class="input-item input-item-textarea ltn__custom-icon ">
                    <textarea placeholder="Type your comments...."></textarea>
                </div>
                <div class="input-item input-item-name ltn__custom-icon">
                    <input type="text" placeholder="Type your name....">
                </div>
                <div class="input-item input-item-email ltn__custom-icon">
                    <input type="email" placeholder="Type your email....">
                </div>
                <div class="btn-wrapper">
                    <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
    <!-- comment-area -->
    {{-- <div class="ltn__comment-area mb-30">
        <h4 class="title-2">Comments (5)</h4>
        <div class="ltn__comment-inner">
            <ul>
                <li>
                    <div class="ltn__comment-item clearfix">
                        <div class="ltn__commenter-img">
                            <img src="img/testimonial/1.jpg" alt="Image">
                        </div>
                        <div class="ltn__commenter-comment">
                            <h6><a href="#">Adam Smit</a></h6>
                            <span class="comment-date">20th May 2020</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                            <a href="#" class="ltn__comment-reply-btn"><i class="fas fa-reply"></i>Reply</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ltn__comment-item clearfix">
                        <div class="ltn__commenter-img">
                            <img src="img/testimonial/3.jpg" alt="Image">
                        </div>
                        <div class="ltn__commenter-comment">
                            <h6><a href="#">Adam Smit</a></h6>
                            <span class="comment-date">20th May 2020</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                            <a href="#" class="ltn__comment-reply-btn"><i class="fas fa-reply"></i>Reply</a>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="ltn__comment-item clearfix">
                                <div class="ltn__commenter-img">
                                    <img src="img/testimonial/4.jpg" alt="Image">
                                </div>
                                <div class="ltn__commenter-comment">
                                    <h6><a href="#">Adam Smit</a></h6>
                                    <span class="comment-date">20th May 2020</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                    <a href="#" class="ltn__comment-reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ltn__comment-item clearfix">
                                <div class="ltn__commenter-img">
                                    <img src="img/testimonial/1.jpg" alt="Image">
                                </div>
                                <div class="ltn__commenter-comment">
                                    <h6><a href="#">Adam Smit</a></h6>
                                    <span class="comment-date">20th May 2020</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                    <a href="#" class="ltn__comment-reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="ltn__comment-item clearfix">
                        <div class="ltn__commenter-img">
                            <img src="img/testimonial/2.jpg" alt="Image">
                        </div>
                        <div class="ltn__commenter-comment">
                            <h6><a href="#">Adam Smit</a></h6>
                            <span class="comment-date">20th May 2020</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                            <a href="#" class="ltn__comment-reply-btn"><i class="fas fa-reply"></i>Reply</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div> --}}
    <!-- comment-reply -->
    {{-- <div class="ltn__comment-reply-area ltn__form-box mb-60">
        <form action="#">
            <h4 class="title-2">Leave a Reply</h4>
            <div class="input-item input-item-textarea ltn__custom-icon">
                <textarea placeholder="Type your comments...."></textarea>
            </div>
            <div class="input-item input-item-name ltn__custom-icon">
                <input type="text" placeholder="Type your name....">
            </div>
            <div class="input-item input-item-email ltn__custom-icon">
                <input type="email" placeholder="Type your email....">
            </div>
            <div class="input-item input-item-website ltn__custom-icon">
                <input type="text" name="website" placeholder="Type your website....">
            </div>
            <label class="mb-0"><input type="checkbox" name="agree"> Save my name, email, and website in this browser for the next time I comment.</label>
            <div class="btn-wrapper">
                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit"><i class="far fa-comments"></i> Post Comment</button>
            </div>
        </form>
    </div> --}}
</x-app-layout>
