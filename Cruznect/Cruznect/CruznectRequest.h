//
//  CruznectRequest.h
//  Cruznect
//
//  Created by Bruce•D•Su on 4/5/14.
//  Copyright (c) 2014 Cruznect. All rights reserved.
//

#import <Foundation/Foundation.h>

#define PROJECT_NAME @"name"
#define PROJECT_DESCRIPTION @"description"
#define PROJECT_IMAGE @"imageURL"

@interface CruznectRequest : NSObject

+ (NSArray *)fetchFeaturedProjectsWithUserID:(NSString *)userID;
+ (NSArray *)fetchAllProjectsWithUserID:(NSString *)userID;
+ (void)postProjectWithPorjectInfo;
+ (UIImage *)imageForProject:(NSString *)projectID;

@end
