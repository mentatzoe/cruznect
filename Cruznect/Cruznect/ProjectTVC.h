//
//  ProjectTVC.h
//  Cruznect
//
//  Created by Bruce•D•Su on 4/5/14.
//  Copyright (c) 2014 Cruznect. All rights reserved.
//

#import <UIKit/UIKit.h>

@protocol ProjectTVCDelegate <NSObject>


@end

@interface ProjectTVC : UITableViewController

@property (strong, nonatomic) NSDictionary *project;
@property (weak, nonatomic) id<ProjectTVCDelegate> delegate;

@end
