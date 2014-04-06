//
//  LoginTVC.h
//  Cruznect
//
//  Created by Bruce•D•Su on 4/5/14.
//  Copyright (c) 2014 Cruznect. All rights reserved.
//

#import <UIKit/UIKit.h>

@class LoginTVC;

@protocol LoginTVCDelegate <NSObject>

- (void)loginSucceedWithEmail:(NSString *)email
					 andPassword:(NSString *)password;

@end

@interface LoginTVC : UITableViewController

@property (weak, nonatomic) id<LoginTVCDelegate> delegate;

@end
